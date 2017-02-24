<?php

yii::$classMap['BymarxConst'] = dirname(dirname(__DIR__)) .'/common/const/BymarxConst.php';

yii::$classMap['CommonConfig'] = dirname(dirname(__DIR__)) .'/common/config/CommonConfig.php';

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
//    'aliases'=>[
//        '@front_webroot' => 'frontend',
//        '@backend_webroot' => 'backend',
//        '@common_lib' => 'common',
//    ],
];
