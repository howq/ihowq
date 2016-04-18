<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>

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
            .news-title a{color:black;}
            .news-title a:link { text-decoration: none;}
            .news-title a:active { text-decoration:blue}
            .news-title a:hover { text-decoration:underline;color: #01A5EC}
            /*.news-title a:visited { text-decoration: none;color: green}*/

            .news-right a{color: #333333;}
            .news-right a:link { text-decoration: none;}
            .news-right a:active { text-decoration:blue}
            .news-right a:hover { text-decoration:underline;color: #01A5EC}


            .news-main{
                /*height: 200px;*/
                background-color: #ffffff;
                margin: 15px 0px;
                /*border: solid red thin;*/
            }
            .news-title{
                margin-top: 0px;
                line-height: 20px;
                font-size: 18px;
                font-weight: bold;
            }
            .news-excerpt p{
                color: #666666;
            }
            .news-excerpt{
                line-height: 20px;
                font-size: 14px;
            }
            .right-elem{
                background-color: #ffffff;
            }
            #head-nav{
                margin:0 auto;
            }
            .new-pic{
                margin-top: 10px;
                margin-bottom: 8px;
            }
            #head-img img{
                display: block;
                margin: 5px auto;
            }
            .news-right{
                margin-left: 20px;
                padding-bottom: 5px;
            }

        </style>

<!--        <link href="http://lib.sinaapp.com/js/bootstrap/v3.0.0/css/bootstrap.css" rel="stylesheet">-->
<!--        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>-->
<!--        <script src="http://lib.sinaapp.com/js/bootstrap/v3.0.0/js/bootstrap.min.js"></script>-->

        <link href="libs/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
<!--        <script src="../views/layouts/js/jquery.min.js"></script>-->
        <script src="libs/js/jquery.min.js" ></script>
        <script src="libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    </head>
    <body>

    <!-- 分类导航 -->
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
            <ul class="nav navbar-nav nav-pills">

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
                        echo '<li><a href="http://localhost/bymarx/web/index.php?r=news/catenews&category_id='.$parentId.'">'.$name.'</a></li>';
                    }else {
                        echo '<li class="dropdown"><a href="http://localhost/bymarx/web/index.php?r=news/catenews&category_id='.$parentId.'" data-toggle="dropdown" class="dropdown-toggle">'.$name.'<span class="caret"></span></a>' .
                            '<ul class="dropdown-menu">';
                        for($i=0;$i<sizeof($childName);$i++){
                            echo '<li><a href="http://localhost/bymarx/web/index.php?r=news/catenews&category_id='.$childIdArr[$i].'">'.$childName[$i].'</a></li>';
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

                    <div id="news-pic-round">

                    </div>

                    <?php
                        $newsMains=$this->params['newsMain'];
                        //print_r(\yii\helpers\Json::encode($newsMains));
                        foreach($newsMains as $newsMain){
                            echo '<div class="news-main col-xs-12 col-md-12" >
                                <div class="col-xs-12 col-sm-4 col-md-4 new-pic">
                                 <a href="http://localhost/bymarx/web/index.php?r=news/content&news_id='.$newsMain['news_id'].'"><img src="'.$newsMain['news_pic'].'" class="img-thumbnail"/></a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 news-content">
                                    <div class="news-title">
                                        <h4><a href="http://localhost/bymarx/web/index.php?r=news/content&news_id='.$newsMain['news_id'].'">'.$newsMain['news_title'].'</a></h4>
                                        </div>

                                    <div class="news-excerpt">
                                        <p class="hidden-xs">'.$newsMain['news_summary'].'</p>
                                    </div>

                                    <div class="jiathis_style hidden-xs">
                                        <span class="jiathis_txt">分享到：</span>
                                        <a class="jiathis_button_qzone">QQ空间</a>
                                        <a class="jiathis_button_tsina">新浪微博</a>
                                        <a class="jiathis_button_tqq">腾讯微博</a>
                                        <a class="jiathis_button_weixin">微信</a>
                                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
                                        <!--<a class="jiathis_counter_style"></a>-->
                                    </div>
                                    <!--<div style="margin:1em 0 2.5em;" class="news-detail">-->
                                    <!--<a href="#" class="btn btn-primary edit hidden-xs">查看更多 »</a>-->
                                    </div>
                                </div>';

                        }
                    ?>


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
                                echo '<a href="http://localhost/bymarx/web/index.php?r=news/content&news_id='.$hotView->news_id.'"><h5>'.$hotView->news_title.'</h5></a>';
                            }
                            ?>

                        </div>

                        <div class="tab-pane" id="comments">
                            <?php
                            $hotComments=$this->params['hotComment'];
                            foreach($hotComments as $hotComment){
                                echo '<a href="http://localhost/bymarx/web/index.php?r=news/content&news_id='.$hotComment->news_id.'"><h5>'.$hotComment->news_title.'</h5></a>';
                            }
                            ?>
                        </div>

                        <div class="tab-pane" id="rands">
                            <?php
                            $rands=$this->params['rands'];
                            foreach($rands as $rand){
                                echo '<a href="http://localhost/bymarx/web/index.php?r=news/content&news_id='.$rand->news_id.'"><h5>'.$rand->news_title.'</h5></a>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer"></footer>


    <script type="text/javascript">

        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i) ? true: false;
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i) ? true: false;
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true: false;
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i) ? true: false;
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
            }
        };

//        if (isMobile.any()){
//            //是移动设备
//            alert('move');
//        }

        var lastId = null;
        var newsCategory = null;
        $(function(){
            $(window).scroll(function() {
                //当内容滚动到底部时加载新的内容
                if ($(this).scrollTop() + $(window).height() + 20 >= $(document).height() && $(this).scrollTop() > 20) {
//                    if(!isMobile.any()){
//                        $('#news-left').append("<img src='http://localhost/bymarx/web/bootstrap/pics/loading.gif' class='img-thumbnail' id='loading'/>");
//                        LoadPage();
//                        //$('#news-left').append("<button id='more'>加载更多</button>");
//                    }
//                    else{
//
//                    }

                    $('#news-left').append("<img src='http://localhost/bymarx/web/bootstrap/pics/loading.gif' class='img-thumbnail' id='loading'/>");
                    LoadPage();
                   // $('#news-left').append("<img src='http://localhost/bymarx/web/bootstrap/pics/loading.gif' class='img-thumbnail' id='loading'/>");
                    //当前要加载的页码
//                    lastId = $(".news-title a:last").attr("href");
//                    var id = lastId.split('=');
//                    lastId = id[2];
                    //$("#news-left").append("<img src='http://www.w3cschool.cc/wp-content/uploads/2013/11/alertOutput1.jpg'>");
                    //setTimeout(null,10000);
                }
            });



        });
        function LoadPage(){
            // alert("开始Ajax");
            $.ajax({
                url: "http://localhost/bymarx/web/index.php?r=news/news",
                data: {},
                dataType: "json",
                success: function (data) {

//                            $.each(data, function (newsIndex, news) {
//                                $('#news-left').append(data[newsIndex].news_id);
//                            });

                    $.each(data, function (newsIndex, news) {
                        var html = '<div class="news-main col-xs-12 col-md-12" >'
                            +'<div class="col-xs-12 col-sm-4 col-md-4 new-pic">'
                            +'<a href="#"><img src="http://image2.thepaper.cn/image/4/594/727.jpg" class="img-thumbnail"/></a>'
                            + '</div>'

                            +'<div class="col-xs-12 col-sm-8 col-md-8 news-content">'
                            +'<div class="news-title">'
                            +"<h4><a href='''+ news.news_id +>"+news.news_title+"</a></h4>"
                            +'</div>'

                            +'<div class="news-excerpt">'
                            +'<p class="hidden-xs">'+news.summary+'</p>'
                            +'</div>'
                            +'</div>'
                            +'</div>';
//                            var html = '<div class="news"><h6>' + news.news_title
//                            + ':</h6><p class="news_summary">' + news.news_summary
//                            + '</p></div>';
                        $('#loading').remove();
                        $('#news-left').append(html);
                    });
                }
            });
            //   alert("结束ajax");

            //$("#news-left").append("<img src='http://www.w3cschool.cc/wp-content/uploads/2013/11/alertOutput1.jpg'>");
        }


        $(function(){
            $("#more").click(function(){
                alert("yes");

//            $.ajax({
//                url: "http://localhost/bymarx/web/index.php?r=news/news",
//                data: {},
//                dataType: "json",
//                success: function (data) {
//
////                            $.each(data, function (newsIndex, news) {
////                                $('#news-left').append(data[newsIndex].news_id);
////                            });
//
//                    $.each(data, function (newsIndex, news) {
//                        var html = '<div class="news-main col-xs-12 col-md-12" >'
//                            +'<div class="col-xs-12 col-sm-4 col-md-4 new-pic">'
//                            +'<a href="#"><img src="http://image2.thepaper.cn/image/4/594/727.jpg" class="img-thumbnail"/></a>'
//                            + '</div>'
//
//                            +'<div class="col-xs-12 col-sm-8 col-md-8 news-content">'
//                            +'<div class="news-title">'
//                            +"<h4><a href='''+ news.news_id +>"+news.news_title+"</a></h4>"
//                            +'</div>'
//
//                            +'<div class="news-excerpt">'
//                            +'<p class="hidden-xs">'+news.summary+'</p>'
//                            +'</div>'
//                            +'</div>'
//                            +'</div>';
////                            var html = '<div class="news"><h6>' + news.news_title
////                            + ':</h6><p class="news_summary">' + news.news_summary
////                            + '</p></div>';
//                        $(":button").remove();
//                        $('#news-left').append(html);
//                    });
//                }
//            });
            });
        });

    </script>


    </body>
</html>
