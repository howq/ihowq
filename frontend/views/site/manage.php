<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>


    <link href="libs/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="libs/js/jquery.min.js" ></script>
    <script src="libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>

    <!--引入ckeditor-->
<!--    <script src="../libs/ckeditor/ckeditor.js"></script>-->
    <script src="libs/ckeditor/ckeditor.js"></script>

    <style type="text/css">
        /*#main{*/
        /*margin-top: 20px;*/
        /*/!*border: solid red;*!/*/
        /*background-color: #EBEBEB;*/
        /*}*/
        #nav-header{
            margin:20px auto;
        }
    </style>

</head>

<body>

<div id="header" class="col-sm-12"><b>后台管理系统</b></div>
<div id="nav-header" class="col-sm-12">
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li><a href="#">管理目录</a></li>
    </ol>
</div>
<div id="left-bar" class="col-sm-2">
    <li id="myTab" class="nav nav-tabs">
        <ul class="active">
            <a href="#home" data-toggle="tab">
                文章上传
            </a>
        </ul>
        <ul><a href="#ios" data-toggle="tab">文章分类</a></ul>
        <ul><a href="#ios" data-toggle="tab">用户管理</a></ul>
        <!--<ul class="dropdown">-->
        <!--<a href="#" id="myTabDrop1" class="dropdown-toggle"-->
        <!--data-toggle="dropdown">Java-->
        <!--<b class="caret"></b>-->
        <!--</a>-->
        <!--<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">-->
        <!--<li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>-->
        <!--<li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>-->
        <!--</ul>-->
        <!--</ul>-->
    </li>
</div>
<div id="main" class="col-md-9">

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <form class="form-horizontal" role="form">

                <div class="form-group">
                    <label class="col-sm-1 control-label">标题</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="news_title" placeholder="标题">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">摘要</label>
                    <div class="col-sm-11">
                        <textarea class="form-control" id="news_summary" placeholder="摘要" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">作者</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="news_author" placeholder="文章作者">
                    </div>

                    <label class="col-sm-1 control-label">分类</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="news_category">
                            <option>类别1</option>
                            <option>类别2</option>
                            <option>类别3</option>
                            <option>类别4</option>
                            <option>类别5</option>
                        </select>
                    </div>

                    <!--标签待补充-->
                    <!--<label class="col-sm-1 control-label">标签</label>-->
                    <!--<div class="col-sm-2">-->
                    <!--<div class="form-group">-->
                    <!--<label class="checkbox-inline">-->
                    <!--<input type="checkbox" id="inlineCheckbox1" value="option1"> 选项 1-->
                    <!--</label>-->
                    <!--<label class="checkbox-inline">-->
                    <!--<input type="checkbox" id="inlineCheckbox2" value="option2"> 选项 2-->
                    <!--</label>-->
                    <!--<label class="checkbox-inline">-->
                    <!--<input type="checkbox" id="inlineCheckbox3" value="option3"> 选项 3-->
                    <!--</label>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">图片</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="news_pic" placeholder="首页图片URL">
                    </div>
                </div>
                <!--<div class="form-group">-->
                <!--<div class="col-sm-10">-->
                <!--<input type="text" class="form-control" id="news_source" placeholder="文章来源">-->
                <!--</div>-->
                <!--</div>-->

                <!--<div class="form-group">-->
                <!--<div class="col-sm-10">-->
                <!--<input type="text" class="form-control" id="news_url" placeholder="文章来源网址">-->
                <!--</div>-->
                <!--</div>-->

                <!--<div class="form-group">-->
                    <!--<label class="col-sm-1 control-label">内容</label>-->
                    <!--<div class="col-sm-11">-->
                        <!--<input type="text" class="form-control" id="news_content" placeholder="内容">-->
                    <!--</div>-->
                <!--</div>-->

                <textarea id="news_content" cols="20" rows="2" class="ckeditor"></textarea>

                <div class="form-group" style="margin-top: 10px;margin-right: 5px">
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn btn-success btn-lg" id="load">上传</button>
                    </div>
                    <div class="col-sm-offset-11 col-sm-1">
                        <button>失败</button>
                    </div>
                </div>
            </form>
        </div>

        <!--文章展示 -->


    </div>

</div>

<script>

    var editor = CKEDITOR.replace('news_content');

//        $("#load").click(function(){
////            alert("开始Ajax");
////            $.ajax({
////                url: "http://localhost/xinminnews/web/index.php?r=news/upload",
////                data: {
////                    news_title:$("#news_title").val(),
////                    news_summary:$("#news_summary").val(),
////                    news_author:$("#news_author").val(),
////                    news_category:$("#news_category").val(),
////                    news_pic:$("#news_pic").val(),
//////                    news_content:$("#news_content").val()
////                    news_content:editor.getData()
////                },
////                dataType: "json",
////                type:"post",
////                success: function(data){
////                    alert("okey");
//////                    alert("ceh");
//////                    $('.container').empty();   //清空resText里面的所有内容
//////                    var html = '';
//////                    $.each(data, function (newsIndex, news) {
//////                        html += '<div class="news"><h6>' + news['news_title']
//////                        + ':</h6><p class="news_summary">' + news['news_summary']
//////                        + '</p></div>';
//////                    });
//////                    $('.container').html(html);
////                }
////
////            });
////            alert("结束ajax");
//        });


</script>

</body>
</html>