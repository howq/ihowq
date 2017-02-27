<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

yii::$classMap['BackendConfig'] = dirname(dirname(__DIR__)) .'/backend/config/BackendConfig.php';

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',//yii2-admin的导航菜单
        ]
    ],
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
            'basePath' => '@webroot/../backend/web/assets',
            'baseUrl' => '@web/../backend/web/assets'
        ],
        'urlManager'=>[
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,  //美化url==ture
            'enableStrictParsing' => false,  //不启用严格解析
            'showScriptName' => false,   //隐藏index.php
            'rules'=>[
                // 加id参数，这里用到了一点点正则，\d+在正则中表示至少一位的纯数字
                'article/<id:\d+>' => 'article/view',
                //标准的控制器/方法显示
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //加id参数
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                // controller和action进行严格限制
                '<controller:(post|comment)>/<id:\d+>/<action:(create|update|delete)>'
                => '<controller>/<action>',
            ],
//            'suffix' => '.html'
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',//允许访问的节点，可自行添加
            'admin/*',//允许所有人访问admin节点及其子节点
        ]
    ],
    'params' => $params,
    'language' => 'zh-CN',//配置成中文
];
