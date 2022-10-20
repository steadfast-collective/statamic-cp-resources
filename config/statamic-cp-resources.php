<?php

return [

    'nav' => [
        'section' => 'Steadfast',
        'title' => 'Resources',
    ],

    'trello_url' => 'https://trello.com/b/uLZV3PP0/issue-reporting-client',

    /**
     * Configure Loom videos to be displayed on the dashboard.
     *
     * The embed_url is the *almost* the same as the sharing link Loom gives you.
     * Except instead of `/share/`, it's `/embed`.
     */
    'looms' => [
        [
            'name' => 'Tour of the Statamic Control Panel',
            'embed_url' => 'https://www.loom.com/embed/55d55888vb7540c69c0e46e5ddeb6999',
        ],
    ],

    'additional_resources' => [
        [
            'name' => 'How to use Trello',
            'url' => 'https://steadfastcollective.com',
        ],
    ],

    // allow control over navigation title
    'nav' => [
        'name' => 'steadfast.',
        'prefix' => 'steadfast',
        'title' => 'Steadfast',
    ],

];
