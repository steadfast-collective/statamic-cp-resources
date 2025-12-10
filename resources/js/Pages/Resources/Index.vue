<script setup>
import { Header, Heading, CardPanel, Button, Card } from '@statamic/cms/ui';
import { Head, Link } from '@statamic/cms/inertia';

const props = defineProps({
    externalUrl: String || null,
    externalName: String || null,
    videos: Array || [],
    additionalResources: Array || [],
});

</script>

<template>
    <div>
        <Head title="Resources" />

        <div class="max-w-5xl mx-auto flex flex-col">
            <Header :title="__('Resources')" icon="pin" level="1">
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
                    icon="link"
                    level="2"
                    class="mb-2"
                >
                    {{ __('Additional Resources') }}
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
                v-if="videos.length > 0 "
            >
                <Heading
                    size="xl"
                    icon="movie-video-clip"
                    level="2"
                    class="mb-2"
                >
                    {{ __('Videos') }}
                </Heading>

                <div class="grid grid-cols-2 gap-4">
                    <CardPanel
                        v-for="(video, index) in videos"
                        :key="index"
                        variant="flat"
                        :heading="video.name"
                    >
                        <div style="position: relative; padding-bottom: 60.55625790139065%; height: 0;">
                            <iframe
                                :src="video.embed_url"
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
