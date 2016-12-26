<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'Europe/Moscow',
            //'timeZone' => 'Europe/Moscow',
            //'timeZone' => 'GMT+3',
            //'dateFormat' => 'd MMMM yyyy',
            //'datetimeFormat' => 'd-M-Y H:i:s',
            //'timeFormat' => 'H:i:s',
        ],
    ],
];
