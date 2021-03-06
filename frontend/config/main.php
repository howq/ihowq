<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

yii::$classMap['FrontendConfig'] = dirname(dirname(__DIR__)) .'/frontend/config/FrontendConfig.php';

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'basePath' => '@webroot/frontend/web/assets',
            'baseUrl' => '@web/frontend/web/assets'
        ],
        'urlManager'=>[
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,  //美化url==ture
            'enableStrictParsing' => false,  //不启用严格解析
            'showScriptName' => false,   //隐藏index.php
            'rules'=>[
                'index'=>'site/index',
                'content'=>'site/content',
                'about'=>'site/about',

                // 加id参数，这里用到了一点点正则，\d+在正则中表示至少一位的纯数字
                'article/<id:\d+>' => 'article/view',
                //标准的控制器/方法显示
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //加id参数
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                // controller和action进行严格限制
                '<controller:(post|comment)>/<id:\d+>/<action:(create|update|delete)>'=> '<controller>/<action>',
            ],
            'suffix' => '.html'
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
