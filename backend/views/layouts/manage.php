<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:25
 */
use yii\helpers\Url;
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>

    <link href="<?=yii::$app->homeUrl.'../'.CommonConfig::COMMON_LIB?>/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?=yii::$app->homeUrl.'../'.CommonConfig::COMMON_LIB?>/js/jquery.min.js"></script>
    <script src="<?=yii::$app->homeUrl.'../'.CommonConfig::COMMON_LIB?>/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=yii::$app->homeUrl.BackendConfig::BACKEND_WEB_LIB?>/jquery-easyui-1.4.4/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?=yii::$app->homeUrl.BackendConfig::BACKEND_WEB_LIB?>/jquery-easyui-1.4.4/themes/icon.css">
    <script src="<?=yii::$app->homeUrl.BackendConfig::BACKEND_WEB_LIB?>/jquery-easyui-1.4.4/jquery.easyui.min.js"></script>

    <!--引入ckeditor-->
    <script src="<?=yii::$app->homeUrl.BackendConfig::BACKEND_WEB_LIB?>/ckeditor/ckeditor.js"></script>
    <script src="<?=yii::$app->homeUrl.BackendConfig::BACKEND_WEB_LIB?>/ckfinder/ckfinder.js"></script>

    <style type="text/css">
        /*#main{*/
        /*margin-top: 20px;*/
        /*/!*border: solid red;*!/*/
        /*background-color: #EBEBEB;*/
        /*}*/
        #nav-header{
            margin:20px 8px;
        }
        #left-menu{
            margin-right: 5vw;
        }
    </style>

</head>
<body>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '后台管理',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['../']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

</div>

<!--<div id="header" class="col-md-12"><b>后台管理系统</b></div>-->
<div id="nav-header" class="col-md-12" style="">
    <ol class="breadcrumb">
        <li><a href="<?=yii::$app->homeUrl?>">首页</a></li>
        <li><a href="<?=Url::toRoute(['manage/index'])?>">管理目录</a></li>
    </ol>
</div>

<div class="container col-md-12">
    <div id="left-menu" class="col-md-1">
        <div class="list-group" style="width: 150px;">
            <a href="<?=Url::toRoute(['manage/editnews'])?>" class="list-group-item active">
                <h4 class="list-group-item-heading">
                    文章管理
                </h4>
            </a>
            <a href="<?=Url::toRoute(['manage/editcategory'])?>" class="list-group-item" onclick="">
                <h4 class="list-group-item-heading">
                    目录管理
                </h4>
            </a>
            <a href="<?=Url::toRoute(['manage/edittag'])?>" class="list-group-item">
                <h4 class="list-group-item-heading">标签管理</h4>
            </a>
        </div>
    </div>
    <div id="right-main" class="col-md-10">
        <?= $content ?>
    </div>
</div>
</body>
</html>
