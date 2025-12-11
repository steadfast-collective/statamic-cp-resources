<?php

return [

    'nav' => [
        'section' => 'Resources',
        'title' => 'Training',
    ],

    'external_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    'external_name' => 'An External URL',

    /**
     * Configure Loom videos to be displayed on the dashboard.
     *
     * The embed_url is the *almost* the same as the sharing link Loom gives you.
     * Except instead of `/share/`, it's `/embed`.
     */
    'looms' => [
        [
            'name' => 'Tour of the Statamic Control Panel',
            'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?si=jr0vGBqKqwERllO8',
        ],
    ],

    'additional_resources' => [
        [
            'name' => 'An Additional Resource',
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ],
    ],

];
