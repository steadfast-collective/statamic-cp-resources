<script setup>
import { Header, Heading, CardPanel, Button, Card } from '@statamic/cms/ui';
import { Head, Link } from '@statamic/cms/inertia';

const props = defineProps({
    title: String || 'Resources',
    externalUrl: String || null,
    externalName: String || null,
    embeds: Array || [],
    embedsTitle: String || 'Embeds',
    embedsIcon: String || 'movie-video-clip',
    additionalResources: Array || [],
    additionalResourcesTitle: String || 'Additional Resources',
    additionalResourcesIcon: String || 'link',
});

</script>

<template>
    <div>
        <Head :title="title" />

        <div class="max-w-5xl mx-auto flex flex-col">
            <Header
                :title="title"
                icon="pin"
                level="1"
            >
                <template #actions>
                    <Button
                        v-if="externalUrl && externalName"
                        :href="externalUrl"
                        iconAppend="arrow-up-right"
                        target="_blank"
                        :text="externalName"
                        variant="primary"
                    />
                </template>
            </Header>

            <div
                v-if="additionalResources.length > 0"
                class="mb-8"
            >
                <Heading
                    size="xl"
                    :icon="additionalResourcesIcon"
                    level="2"
                    class="mb-2"
                >
                    {{ additionalResourcesTitle }}
                </Heading>

                <Card class="grid grid-cols-2 gap-4">
                    <Button
                        v-for="(resource, index) in additionalResources"
                        :key="index"
                        :text="resource.name"
                        iconAppend="arrow-up-right"
                        :href="resource.url"
                        target="_blank"
                        class="w-full"
                    />
                </Card>
            </div>

            <div
                v-if="embeds.length > 0 "
            >
                <Heading
                    size="xl"
                    :icon="embedsIcon"

                    level="2"
                    class="mb-2"
                >
                    {{ embedsTitle }}
                </Heading>

                <div class="grid grid-cols-2 gap-4">
                    <CardPanel
                        v-for="(embed, index) in embeds"
                        :key="index"
                        variant="flat"
                        :heading="embed.name"
                    >
                        <div style="position: relative; padding-bottom: 60.55625790139065%; height: 0;">
                            <iframe
                                :src="embed.embed_url"
                                frameborder="0"
                                webkitallowfullscreen
                                mozallowfullscreen
                                allowfullscreen
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                            ></iframe>
                        </div>
                    </CardPanel>
                </div>
            </div>

        </div>
    </div>
</template>
