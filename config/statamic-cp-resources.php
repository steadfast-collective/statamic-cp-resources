<?php

/*
|--------------------------------------------------------------------------
| Legacy Configuration (Backward Compatibility)
|--------------------------------------------------------------------------
| These values are now managed via the CP: Tools > Addons > Settings.
| Settings saved in the CP take precedence over values in this file.
| This file is retained so existing published configs continue to work.
*/

return [

    'nav' => [
        'section' => 'Resources',
        'title' => 'Training',
    ],

    'external_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    'external_name' => 'An External URL',

    /**
     * Configure embeds to be displayed on the resources page.
     * Ideally these should be videos, such as YouTube, Vimeo, or Loom embeds.
     * However,
     */
    'embeds_title' => 'Embeds',
    'embeds_icon' => 'movie-video-clip',
    'embeds' => [
        [
            'name' => 'Youtube Embed',
            'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?si=jr0vGBqKqwERllO8',
        ],
        [
            'name' => 'Vimeo Embed',
            'embed_url' => 'https://player.vimeo.com/video/786237718?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479',
        ],
        [
            'name' => 'Loom Embed',
            'embed_url' => 'https://www.loom.com/embed/473fad25ebd24b5ea8091503253dfecf',
        ],
        [
            'name' => 'Scribe Embed',
            'embed_url' => 'https://scribehow.com/viewer/How_to_use_Scribe__csOSUfOlQJGuzFx2HN92wQ'
        ]
    ],

    'additional_resources_title' => 'Additional Resources',
    'additional_resources_icon' => 'link',
    'additional_resources' => [
        [
            'name' => 'An Additional Resource',
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ],
    ],

];
