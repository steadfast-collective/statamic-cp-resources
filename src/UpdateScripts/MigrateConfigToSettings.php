<?php

namespace SteadfastCollective\StatamicCpResources\UpdateScripts;

use Statamic\Facades\Addon;
use Statamic\UpdateScripts\UpdateScript;

class MigrateConfigToSettings extends UpdateScript
{
    public function shouldUpdate($newVersion, $oldVersion): bool
    {
        // Treat dev installs (e.g. dev-statamic-6) as always qualifying for the new version.
        $newVersionQualifies = str_starts_with($newVersion, 'dev-')
            || version_compare($newVersion, '5.0.0.0', '>=');

        return $newVersionQualifies && version_compare($oldVersion, '5.0.0.0', '<');
    }

    public function update(): void
    {
        if (config('statamic-cp-resources') === null) {
            $this->console()->info('No published config found; skipping migration.');

            return;
        }

        $addon = Addon::get('steadfast-collective/statamic-cp-resources');
        $settings = $addon->settings();

        $map = [
            'nav_section'                => 'statamic-cp-resources.nav.section',
            'nav_title'                  => 'statamic-cp-resources.nav.title',
            'external_url'               => 'statamic-cp-resources.external_url',
            'external_name'              => 'statamic-cp-resources.external_name',
            'embeds_title'               => 'statamic-cp-resources.embeds_title',
            'embeds_icon'                => 'statamic-cp-resources.embeds_icon',
            'embeds'                     => 'statamic-cp-resources.embeds',
            'additional_resources_title' => 'statamic-cp-resources.additional_resources_title',
            'additional_resources_icon'  => 'statamic-cp-resources.additional_resources_icon',
            'additional_resources'       => 'statamic-cp-resources.additional_resources',
        ];

        $migrated = [];
        $skipped = [];

        foreach ($map as $handle => $configPath) {
            $configValue = config($configPath);

            if ($configValue === null) {
                continue;
            }

            // Non-destructive: don't overwrite keys already saved in CP settings
            if ($settings->get($handle) !== null) {
                $skipped[] = $handle;

                continue;
            }

            $settings->set($handle, $configValue);
            $migrated[] = $handle;
        }

        if (empty($migrated)) {
            $this->console()->info('statamic-cp-resources: Nothing to migrate.');

            return;
        }

        $settings->save();

        $this->console()->info('statamic-cp-resources: Migrated config to CP settings: '.implode(', ', $migrated));

        if (! empty($skipped)) {
            $this->console()->info('statamic-cp-resources: Skipped (already set in CP): '.implode(', ', $skipped));
        }
    }
}
