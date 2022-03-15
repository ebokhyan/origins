<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    |
    | Here you can define the options that are passed to all NovaTinyMCE
    | fields by default.
    |
    */

    'default_options' => [
        'content_css' => '/vendor/tinymce/skins/ui/oxide/content.min.css',
        'skin_url' => '/vendor/tinymce/skins/ui/oxide',
        'path_absolute' => '/',
        'plugins' => [
            'lists preview hr anchor pagebreak image wordcount fullscreen directionality paste textpattern link media table code'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image link media | table',
        'relative_urls' => false,
        'use_lfm' => true,
        'lfm_url' => 'filemanager',
        'height' => '400',
        'remove_script_host' => false,
        'convert_urls' => true
    ],
];
