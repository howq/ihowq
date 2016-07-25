<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/2
 * Time: 15:06
 */
?>

<style type="text/css">

    #news-left{
        /*border: solid cadetblue thin;*/
    }
    #news-title a{color:black;}
    #news-title a:link { text-decoration: none;}
    #news-title a:active { text-decoration:blue}
    #news-title a:hover { text-decoration:none;color: #01A5EC}
    #news-contain{
        background-color: #ffffff;
        padding: 2vh 2.5vw;
    }
    #nav-header{
        margin:0 auto;
    }
    #news-title{
        margin: 3vh auto;
    }
    #news-pic img{
        display: block;
        margin: 20px auto;
    }
    #news-source{
        margin: 20px auto;
    }
    #news-content img{
        display: inline-block;
        max-width: 100%;
        height: auto;
        padding: 1vw;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    @media (max-width: 767px) {
        .col-xs-12{
            padding: 0;
        }
        #news-contain{
            background-color: initial;
            padding: 0.2vh 4vw;
        }

    }

</style>

<link rel="stylesheet" href="common/libs/editor/css/editormd.preview.css" />
        <!--左侧文章目录-->
<div id="news-left" class="col-xs-12 col-sm-7 col-sm-offset-1">
         <div id="nav-header" class="hidden-xs">
             <ol class="breadcrumb">
                 <li><a href="index.php">首页</a></li>
                 <li><?php
                         if(sizeof($content)==1){
                             echo '<a href="index.php">'.'其他'.'</a>';
                         }else{
                             echo '<a href="index.php?r=site/index&category_id='.$content[0]['news_category'].'">'.$content[1]['category_name'].'</a>';
                         }
                         ?>
                 </li>
             </ol>
         </div>
         <div id="news-contain">

             <div id="news-title">
                 <h2 style="font-weight: bold"><a href="#"><?=$content[0]['news_title']?></a></h2>
             </div>

             <div id="news-source" class="hidden-xs">
                 <span><?=$content[0]['news_author']?></span>
                 <span><?=$content[0]['news_date']?></span>
                 <span><a href="<?=$content[0]['news_url']?>"><?=$content[0]['news_source']?></a></span>
                 <span><?=$content[0]['news_editor']?></span>
             </div>

             <div id="news-pic">
                 <?php
                 // echo '<img src="'.$content[0]['news_pic'].'" alt="马化腾和刘强东" class="img-responsive" />'
                 ?>
             </div>

             <div id="news-content">
                 <textarea id="append-test" style="display:none;">
                     <?php
                     echo $content[0]['news_content'];
                     //print_r($content);
                     ?>
                 </textarea>
             </div>
         </div>

         <div class="comments" style="margin-top: 4vh;padding: 0.5vh 2vw;background-color: #fff;">
             <span style="font-size: large;padding-bottom: 30px;font-style: italic"><b>文章评论</b></span>
             <!-- 多说评论框 start -->
             <div class="ds-thread" data-thread-key="<?=$content[0]['news_id']?>" data-title="<?=$content[0]['news_title']?>" data-url="<?=\YII::$app->request->hostInfo?>/web/index.php?r=site/content&news_id=<?=$content[0]['news_id']?>"></div>
             <!-- 多说评论框 end -->
         </div>
</div>

<script type="text/javascript">
    var Init = {
        addView:function(){
            $.ajax({
                url: "index.php?r=site/view",
                type: "get",
                data: {
                    newsId:<?=$content[0]['news_id']?>
                }
            });
        }
    }
    Init.addView();
</script>

<script src="common/libs/editor/editormd.min.js"></script>

<script src="common/libs/editor/lib/marked.min.js"></script>
<script src="common/libs/editor/lib/prettify.min.js"></script>

<script src="common/libs/editor/lib/raphael.min.js"></script>
<script src="common/libs/editor/lib/underscore.min.js"></script>
<script src="common/libs/editor/lib/sequence-diagram.min.js"></script>
<script src="common/libs/editor/lib/flowchart.min.js"></script>
<script src="common/libs/editor/lib/jquery.flowchart.min.js"></script>

<script type="application/javascript">
    testEditormdView2 = editormd.markdownToHTML("news-content", {
        htmlDecode      : "style,script,iframe",  // you can filter tags decode
        //toc             : false,
        //tocm            : true,    // Using [TOCM]
        //emoji           : true,
        taskList        : true,
        tex             : true,  // 默认不解析
        flowChart       : true,  // 默认不解析
        sequenceDiagram : true,  // 默认不解析
    });

</script>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name:"bymarx"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->