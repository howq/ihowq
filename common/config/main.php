<?php

yii::$classMap['BymarxConst'] = dirname(dirname(__DIR__)) .'/common/const/BymarxConst.php';

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
