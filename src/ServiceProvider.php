<?php

namespace SteadfastCollective\StatamicCpResources;

use Statamic\Facades\Addon;
use Statamic\Facades\CP\Nav;
use Statamic\Facades\Permission;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $vite = [
        'input' => [
            'resources/css/addon.css',
            'resources/js/addon.js',
        ],
        'publicDirectory' => 'resources/dist',
    ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-cp-resources');
    }

    public function bootAddon()
    {
        $this->registerSettingsBlueprint([
            'tabs' => [
                'main' => [
                    'display' => __('Settings'),
                    'sections' => [
                        [
                            'display' => __('Navigation'),
                            'fields' => [
                                [
                                    'handle' => 'nav_section',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('Nav Section'),
                                        'instructions' => __('The CP sidebar section this item appears under.'),
                                    ],
                                ],
                                [
                                    'handle' => 'nav_title',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('Nav Title'),
                                        'instructions' => __('The label shown in the CP sidebar.'),
                                    ],
                                ],
                            ],
                        ],
                        [
                            'display' => __('External Link'),
                            'fields' => [
                                [
                                    'handle' => 'external_url',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('External URL'),
                                        'input_type' => 'url',
                                    ],
                                ],
                                [
                                    'handle' => 'external_name',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('External Link Label'),
                                    ],
                                ],
                            ],
                        ],
                        [
                            'display' => __('Embeds'),
                            'fields' => [
                                [
                                    'handle' => 'embeds_title',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('Section Title'),
                                    ],
                                ],
                                [
                                    'handle' => 'embeds_icon',
                                    'field' => [
                                        'type' => 'icon',
                                        'display' => __('Section Icon'),
                                        'default' => "movie-video-clip"
                                    ],
                                ],
                                [
                                    'handle' => 'embeds',
                                    'field' => [
                                        'type' => 'grid',
                                        'display' => __('Embeds'),
                                        'fields' => [
                                            [
                                                'handle' => 'name',
                                                'field' => [
                                                    'type' => 'text',
                                                    'display' => __('Name'),
                                                ],
                                            ],
                                            [
                                                'handle' => 'embed_url',
                                                'field' => [
                                                    'type' => 'text',
                                                    'display' => __('Embed URL'),
                                                    'input_type' => 'url',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'display' => __('Additional Resources'),
                            'fields' => [
                                [
                                    'handle' => 'additional_resources_title',
                                    'field' => [
                                        'type' => 'text',
                                        'display' => __('Section Title'),
                                    ],
                                ],
                                [
                                    'handle' => 'additional_resources_icon',
                                    'field' => [
                                        'type' => 'icon',
                                        'display' => __('Section Icon'),
                                        'instructions' => __('A Statamic icon name, e.g. link.'),
                                        'default' => 'link'
                                    ],
                                ],
                                [
                                    'handle' => 'additional_resources',
                                    'field' => [
                                        'type' => 'grid',
                                        'display' => __('Additional Resources'),
                                        'fields' => [
                                            [
                                                'handle' => 'name',
                                                'field' => [
                                                    'type' => 'text',
                                                    'display' => __('Name'),
                                                ],
                                            ],
                                            [
                                                'handle' => 'url',
                                                'field' => [
                                                    'type' => 'text',
                                                    'display' => __('URL'),
                                                    'input_type' => 'url',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        Nav::extend(function ($nav) {
            $settings = Addon::get('steadfast-collective/statamic-cp-resources')->settings();

            $nav->content($settings->get('nav_title', config('statamic-cp-resources.nav.title', 'Resources')))
                ->section($settings->get('nav_section', config('statamic-cp-resources.nav.section', 'Steadfast')))
                ->route('cp-resources.index')
                ->icon('pin')
                ->can('view resources');
        });

        Permission::register('view resources')
            ->label('View Resources');
    }
}
