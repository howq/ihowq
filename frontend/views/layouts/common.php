<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="<?= Html::encode($this->description) ?>">
    <meta name="keywords" content="<?= Html::encode($this->keywords) ?>">

    <link rel="stylesheet" type="text/css" href="frontend/libs/css/papermashup.css">     <!--标签颜色-->

    <link href="common/libs/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!--        <script src="../views/layouts/js/jquery.min.js"></script>-->
    <script src="common/libs/js/jquery.min.js" ></script>
    <script src="common/libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    <!--ToHead-->
    <link href="frontend/libs/css/tohead.css" rel="stylesheet" type="text/css" />
    <script src="frontend/libs/js/tohead.js"></script>

    <style type="text/css">
        html{
            height: 100%;
            width: 100%;
        }
        body{
            height: 100%;
            width: 100%;
            background-color: #EBEBEB;
            font-family: "Microsoft Yahei","Hiragino Sans GB", sans-serif;
        }
        #header{
            margin:0 auto;
        }

        #head-img img{
            display: block;
            margin: 5px auto;
        }

        #main{
            margin-top: 3vh;
            height:100% ;
            width:100%;
            padding: 0;
        }
        #left-parent{
            padding: 0;
        }

        #news-left{
            padding: 0;
        }
        #news-right{
            margin-left: 1vw;
        }
        #myTab{
            background-color: #F1F3F8;
            font-size: 1.6rem;
        }
        #myTab li{
            padding-right: 20px;
        }

        .news-title,a:link { text-decoration: none;color:black;}
        .news-title,a:visited { text-decoration: none;color: black}
        .news-title,a:hover { text-decoration:none;color: #01A5EC}
        .news-title,a:active { text-decoration:none;}

        .news-info a:link { text-decoration: none;color:#888;}
        .news-info a:visited { text-decoration: none;color: #888}
        .news-info a:hover { text-decoration:none;color: #01A5EC}
        .news-info a:active { text-decoration:none;}

        #news-right a{color: #333333;}
        #news-right a:link { text-decoration: none;}
        #news-right a:visited { text-decoration: none;color: black}
        #news-right a:hover { text-decoration:none;color: #01A5EC}
        #news-right a:active { text-decoration:none}

        .news-tags{
            font-size: 1em;
            height: 3vh;
            margin: 0 3px;
        }

        .news-tags a:hover {
            color: #61b4ff;
        }

        .news-tags a {
            color: #bbb;
            padding: 0 4px;
        }

        .navbar-inverse{
            background-color: #188cd0!important;
            border-color: #F5F5F5!important;
        }

        #brand{
            color: #f5f5f5;
            padding: 2.3vh 1vw;
            font-weight: bold;
            font-size: 3.7vh;
        }
        #brand:hover {
            color: #ff605b;
            background-color: transparent;
        }
        .navbar-nav>li>a {
            color: #f5f5f5 !important;
            font-family: "Microsoft YaHei UI"!important;
            font-size:2vh;
        }
        .navbar-nav>li>a:hover {
            color: #d8ff8b !important;
            background-color: transparent;
        }

        .news-main{
            height:20vh;
            background-color: #ffffff;
            /*margin: 2vh 0;*/
            margin: 1px 0;
            padding: 1vh 1vw 0 1vw;
        }
        .news-main:hover{
            background-color: #f0f0f0;
        }

        .pic-parent{
            height:17vh;
            padding: 0.4vh 0;
            text-align:center;
        }

        .news-pic,.img-thumbnail{
            vertical-align:middle;
            min-width:98% ;
            height:100%;
            padding:0;
            background-color:#fff;
            border:0;
            border-radius:0;
        }
        .news-content{
            height:18vh;
            padding-left:1vw;
            font-size: 10px;
        }

        .news-title {
            line-height: 4vh;
            font-weight: 600;
            height: 4vh;
            font-family: "Hiragino Sans GB","Microsoft Yahei",sans-serif;
            font-size: 1.7rem;
        }
        .news-excerpt{
            font-size: 1.4rem;
            margin: 0.5vh 0 0.2vh 0;
            color: #888;
            line-height: 2.8vh;
            height: 10.5vh;
        }
        .news-info{
            color:#888;
        }
        .news-info span{
            padding-right: 10px;
        }
        .news-info .item-view{
            padding-right: 0px;
            float:right;
        }
        .news-info .glyphicon{
            color: #999;
            padding-right:4px
        }

        @media (max-width: 767px) {
            .col-xs-3 {
                width: 31%;
            }
            .col-xs-9 {
                width: 69%;
                padding-right: 0;
            }
            #main {
                margin-top: 0;
            }
            .news-main{
                height:20vh;
                background-color: #ffffff;
                margin: 1.1px 0;
                padding: 1.2vh 0.8vw 1.2vh 3vw;
            }
            .news-main:hover{
                background-color: #ffffff;
            }
            .pic-parent{
                height:18vh;
                padding:2% 0 3% 0;
                text-align:center;
            }

            .news-pic,.img-thumbnail{
                vertical-align:middle;
                min-width:98%;
                height:100%;
                padding:0;
                background-color:#fff;
                border:0;
                border-radius:0;
            }
            .news-content{
                height:17.8vh;
                padding:0.4vh 0 0 2vw;
                font-size: 10px;
            }
            .news-title {
                margin-bottom: 1vh;
                line-height: 4.4vh;
                font-weight: 500;
                height: 4vh;
                font-family: 'Hiragino Sans GB';
                font-size: 1.59rem;
            }
            .news-excerpt{
                font-size: 1.35rem;
                margin-top: 0.3vh;
                color: #888;
                line-height: 3.5vh;
                height: 9vh;
            }
            .news-info .item-view{
                padding-right: 8px;
                float:right;
            }
            .navbar-inverse .navbar-toggle{
                background-color: #188cd0!important;
                border-color: #188cd0 !important;
                margin-left: 8vw!important;
                margin-right: 0!important;
            }

            .inverse .navbar-nav>.open>a:hover {
                color: #fff;
                background-color: #188cd0!important;
            }
            .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
                color: #fff;
                background-color: #188cd0!important;
            }

            .navbar-toggle {
                color: #F5F5F5!important;
                border-color: #188CD0!important;
            }
            .navbar-toggle:hover {
                color: #F5F5F5!important;
                border-color: #188cd0!important;
                background-color: transparent;
            }

            .navbar-nav>li>.dropdown-menu {
                border-color: #1893d8 !important;
                background-color: #1893d8 !important;
            }
            .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
                color: #f58873 !important;
                font-family: "Microsoft YaHei UI"!important;
                /*font-size: larger;*/
            }

            .navbar-form{
                margin-top: 16px!important;
                border-color: #F5F5F5!important;
            }
            .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form{
                border-color: #1893d8 !important;
            }
            .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover{
                background-color: #188CD0 !important;
                border-color: #1893d8 !important;
            }
        }

        @media (min-width: 768px) and (max-width: 1400px){
            #news-left {
                margin-left: 7%;
                width: 60%;
            }
            .news-main{
                height:28vh;
                background-color: #ffffff;
                /*margin: 2vh 0;*/
                margin: 1px 0;
                padding: 1vh 1vw 0 1vw;
            }
            .news-main:hover{
                background-color: #f0f0f0;
            }

            .pic-parent{
                width: 28%;
                height:24vh;
                padding: 1.5vh 0 0.8vh 0;
                text-align:center;
            }

            .news-pic,.img-thumbnail{
                vertical-align:middle;
                min-width:98% ;
                height:100%;
                padding-top:0;
                background-color:#fff;
                border:0;
                border-radius:0;
            }
            .news-content{
                width: 72%;
                height:24vh;
                padding-left:18px;
                font-size: 10px;
            }

            .news-title {
                line-height: 35px;
                font-weight: 600;
                height: 4vh;
                font-family: "Hiragino Sans GB","Microsoft Yahei",sans-serif;
                font-size: 1.7rem;
            }
            .news-excerpt{
                font-size: 1.4rem;
                margin: 0.5vh 0 0.2vh 0;
                color: #888;
                line-height: 22px;
                height: 15vh;
            }
            #brand{
                font-size:3.8vh;
            }
            .navbar-nav>li>a {
                font-size:2.6vh;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {

        }

        @media (min-width: 992px) and (max-width: 1280px) {
            #myTab{
                font-size: 1.3rem;
            }
            #myTab li{
                padding-right: 0.5vw;
            }
        }

        @media (min-width: 1401px) {
            .pic-parent{
                width: 23%;
            }
            .news-content{
                width: 77%;
            }
        }
    </style>
</head>
<body>
<div class="wrap">

    <a id="top"></a>
    <!-- 分类导航 -->
    <div class="navbar navbar-inverse col-md-12" role="navigation" id="header" >
        <div class="navbar-header col-md-offset-1">
            　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse"">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
            <a href="index.php" class="navbar-brand " id="brand">白马工作室</a>
        </div>

        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">

                <?php
                $category=$this->params['category'];

                $categoryName = $category['category_name'];
                $categoryId = $category['category_id'];
                $order=0;
                $parentId=0;
                $childIdArr=array();

                foreach($categoryName as $name=>$childName){
                    $orderId=0;
                    foreach ($categoryId as $id=>$ChildId) {
                        $parentId = $id;
                        $childIdArr=$ChildId;
                        if ($order == $orderId) break;
                        $orderId++;
                    }
                    if(empty($childName)){
                        echo '<li><a href="index.php?r=site/index&category_id='.$parentId.'">'.$name.'</a></li>';
                    }else {
                        echo '<li class="dropdown"><a href="index.php?r=site/index&category_id='.$parentId.'" data-toggle="dropdown" class="dropdown-toggle">'.$name.'<span class="caret"></span></a>' .
                            '<ul class="dropdown-menu">';
                        for($i=0;$i<sizeof($childName);$i++){
                            echo '<li><a href="index.php?r=site/index&category_id='.$childIdArr[$i].'">'.$childName[$i].'</a></li>';
                        }
                        echo '</ul></li>';
                    }
                    $order++;
                }
                ?>

                <li><a href="index.php?r=site/about">关于我们</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
            <div class="col-md-1 navbar-right"></div>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
        </div>

    </div>
    <div class="container col-xs-12" id="main">

            <!--左侧文章列表或文章主体-->
        <div style="color: red;height: 40px;background-color: white;margin-bottom: 12px">
            <span class="col-xs-1"></span>
            <span class="glyphicon glyphicon-volume-up" style="margin-top: 10px;padding-right: 8px"></span>网站建设中...
        </div>


            <?= $content ?>

            <!--右侧热点文章-->
            <div class="hidden-xs visible-md-block visible-lg-block col-md-3 col-lg-3" id="news-right">

                <aside id="news-right" class="hidden-xs widget widget_views panel panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li>
                                <span>
                                    <a><img src="frontend/img/hot.png" href="#views" alt="热评" title="热评"></a>
                                    <a href="#comments" role="tab" data-toggle="tab">热评</a>
                                </span>
                            </li>
                            <li class="active">
                                <span>
                                    <a><img src="frontend/img/eye.png" href="#views" alt="热览" title="热览"></a>
                                    <a href="#views" role="tab" data-toggle="tab">热览</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <a><img src="frontend/img/random.png" href="#views" alt="随机" title="随机"></a>
                                    <a href="#rands" role="tab" data-toggle="tab">随机</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <div class="tab-content news-right">
                                <div class="tab-pane active" id="views">
                                    <?php
                                    $hotViews=$this->params['hotView'];
                                    foreach($hotViews as $hotView){
                                        $tmp = '<a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="index.php?r=site/content&news_id='.$hotView->news_id.'">
                                            <span class="badge">
                                                    '.$hotView->browse_count.'
                                            </span>

                                            <span class="glyphicon glyphicon-list-alt">
                                            </span>
                                            '.$hotView->news_title.'
                                            <span class="clearfix">
                                            </span>
                                    </a>';
                                        echo $tmp;
                                    }
                                    ?>

                                </div>

                                <div class="tab-pane" id="comments">
                                    <?php
                                    $hotComments=$this->params['hotComment'];
                                    foreach($hotComments as $hotComment){
                                        $tmp = '<a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="index.php?r=site/content&news_id='.$hotComment->news_id.'">
                                            <span class="badge">
                                                    '.$hotComment->browse_count.'
                                            </span>

                                            <span class="glyphicon glyphicon-list-alt">
                                            </span>
                                            '.$hotComment->news_title.'
                                            <span class="clearfix">
                                            </span>
                                    </a>';
                                        echo $tmp;
                                    }
                                    ?>
                                </div>

                                <div class="tab-pane" id="rands">
                                    <?php
                                    $rands=$this->params['rands'];
                                    foreach($rands as $rand){
                                        $tmp = '<a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="index.php?r=site/content&news_id='.$rand->news_id.'">
                                            <span class="badge">
                                                    '.$rand->browse_count.'
                                            </span>

                                            <span class="glyphicon glyphicon-list-alt">
                                            </span>
                                            '.$rand->news_title.'
                                            <span class="clearfix">
                                            </span>
                                    </a>';
                                        echo $tmp;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>


    </div>

    <div style="display: none;" id="rocket-to-top" class="hidden-xs">
        <div style="opacity:0;display: block;" class="level-2"></div>
        <div class="level-3"></div>
    </div>

</div>
<!--<footer class="footer" style="margin-top: 5px">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; 白马工作室 --><?//= date('Y') ?><!--</p>-->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

</body>
</html>



