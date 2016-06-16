<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章页</title>
    <style type="text/css">
        #main{
            margin-top: 20px;
            /*border: solid red;*/
            background-color: #EBEBEB;
        }
        #news-left{
            /*border: solid cadetblue thin;*/
        }
        #news-right{
            /*border-left: solid darkseagreen thin;*/
            margin-left:10px;
            padding-left: 20px;
        }
        #news-title a{color:black;}
        #news-title a:link { text-decoration: none;}
        #news-title a:active { text-decoration:blue}
        #news-title a:hover { text-decoration:none;color: #01A5EC}

        .right-elem{
            background-color: #ffffff;
        }

        #news-contain{
            background-color: #ffffff;
            padding: 10px 30px;
        }
        #nav-header{
            margin:20px auto;
        }
        #news-title{
            margin: 20px auto;
        }
        #news-contain img{
            display: block;
            margin: 20px auto;
        }
        #news-source{
            margin: 20px auto;
        }
        .tab-content{
            padding: 10px 8px 2px 8px;
        }
        .news-right{
            margin-left: 20px;
            padding-bottom: 5px;
        }
    </style>

</head>
<body>

<div class="navbar navbar-inverse" role="navigation" id="head-nav" >
    <div class="navbar-header col-md-offset-1">
        　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
        <a href="##" class="navbar-brand ">白马公社</a>
    </div>

    <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
    <div class="collapse navbar-collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav nav-pills">、

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
                    echo '<li><a href="##">'.$name.$parentId.'</a></li>';
                }else {
                    echo '<li class="dropdown"><a href="##" data-toggle="dropdown" class="dropdown-toggle">'.$name.$parentId.'<span class="caret"></span></a>' .
                        '<ul class="dropdown-menu">';
                    for($i=0;$i<sizeof($childName);$i++){
                        echo '<li><a href="##">'.$childName[$i].$childIdArr[$i].'</a></li>';
                    }
                    echo '</ul></li>';
                }
                $order++;
            }
            ?>

        </ul>

    </div>

</div>

<!--主要内容-->
<div class="container col-sm-12" id="main">
    <div class="row">

        <!--左侧文章目录-->
        <div class="col-sm-12 col-md-7 col-md-offset-1">
            <div id="news-left" class="col-xs-12 col-sm-12">
                <div id="nav-header">
                    <ol class="breadcrumb">
                        <li><a href="http://localhost/xinminnews/web/index.php">首页</a></li>
                        <li><a href="#"><?php
                                if(sizeof($content)==1){
                                    echo '其它';
                                }else{
                                    $content[1]['category_name'];
                                }
                                ?>
                            </a>
                        </li>
                    </ol>
                </div>
                <div id="news-contain">

                    <div id="news-title">

                        <h2><a href="#"><?=$content[0]['news_title']?></a></h2>
                    </div>

                    <div id="news-source" class="hidden-xs">
                        <span>作者：</span><?=$content[0]['news_author']?>
                        <span>来源：</span><a href="#"><?=$content[0]['news_source']?></a>
                        <span>发布时间：</span><?=$content[0]['news_date']?>
                        <span>编辑：</span><?=$content[0]['news_editor']?>
                    </div>
                    <div class="visible-xs">
                        <hr />
                        <p>&nbsp;</p>
                    </div>


                    <div id="news-pic">
                        <?php
                           // echo '<img src="'.$content[0]['news_pic'].'" alt="马化腾和刘强东" class="img-responsive" />'
                        ?>
                    </div>

                    <div id="news-content">
                        <?php
                            echo $content[0]['news_content'];
                        //print_r($content);
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <!--右侧热点文章-->
        <div class="hidden-xs  visible-md-block visible-lg-block col-md-3 col-lg-3" id="news-right">

            <br />
            <div class="right-elem">
                <ul class="nav nav-tabs" role="tablist" id="myTab">
                    热门文章<br/>
                    <li class="active"><a href="#views" role="tab" data-toggle="tab">热览</a></li>
                    <li><a href="#comments" role="tab" data-toggle="tab">热评</a></li>
                    <li><a href="#rands" role="tab" data-toggle="tab">随机</a></li>
                </ul>

                <div class="tab-content news-right">
                    <div class="tab-pane active" id="views">
                        <?php
                        $hotViews=$this->params['hotView'];
                        foreach($hotViews as $hotView){
                            echo '<a href="'.$hotView->news_id.'"><h5>'.$hotView->news_title.'</h5></a>';
                        }
                        ?>

                    </div>

                    <div class="tab-pane" id="comments">
                        <?php
                        $hotComments=$this->params['hotComment'];
                        foreach($hotComments as $hotComment){
                            echo '<a href="'.$hotComment->news_id.'"><h5>'.$hotComment->news_title.'</h5></a>';
                        }
                        ?>
                    </div>

                    <div class="tab-pane" id="rands">
                        <?php
                        $rands=$this->params['rands'];
                        foreach($rands as $rand){
                            echo '<a href="'.$rand->news_id.'"><h5>'.$rand->news_title.'</h5></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jiathis_r.js?move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
<!-- UJian Button BEGIN -->
<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js?type=slide"></script>
<!-- UJian Button END -->

</body>
</html>