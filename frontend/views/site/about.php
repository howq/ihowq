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

    <div id="news-contain">

        <div id="news-content">
                 <textarea id="append-test" style="display:none;">
<?php
//use BymarxConst;

$bymarxConst = new BymarxConst();
$navtype=(int)($this->params['navtype']);
if($bymarxConst::NAVTYPE_ABOUT==$navtype){
    include 'content/about-us.php';
}elseif ($bymarxConst::NAVTYPE_DRIVE_HORSE_PROJECT==$navtype) {
    include 'content/drive-horse-project.php';
}elseif($bymarxConst::NAVTYPE_OPEN_PLAN==$navtype){
    include 'content/open-plan.php';
}
?>
                 </textarea>
        </div>
    </div>

</div>

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
