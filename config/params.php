<?php

return [
    'adminEmail' => '',
    'supportEmail' => '',

    'file' => [
        'extensions' => 'png, jpg',
        'maxSize' => 30*1024*1024,
        'maxFiles' => 50,
        'path' => dirname(__DIR__) . '/files',
    ],
    'image' => [
        'path' => 'image',
        'jpeg_quality' => 90,
        'watermark' => [
            'enabled' => true,
            'absolute' => true,
            'file' => '@webroot/img/watermark.png',
            'x' => 25,
            'y' => 20,
        ],
        'none' => '/img/photo-default.png?1',
        'size' => [
            'big' => [
                'width' => 940,
                'height' => 705,
            ],
            'cover' => [
                'width' => 600,
                'height' => 600,
                'method' => 'crop',
                'watermark' => [
                    'enabled' => false,
                ],
            ],
        ],
    ],

];
