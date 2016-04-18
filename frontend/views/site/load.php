<?php
/**
 * Created by PhpStorm.
 * User: buzhiknight
 * Date: 2015/10/23
 * Time: 22:08
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!--引入ckeditor-->
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <link rel="stylesheet" href="css/samples.css">
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">

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
<div class="container">
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



                    <textarea id="news_content" cols="20" rows="2" class="ckeditor"></textarea>

                    <div class="form-group" style="margin-top: 10px;margin-right: 5px">
                        <div class="col-sm-offset-11 col-sm-1">
                            <button type="submit" class="btn btn-success btn-lg" id="load">上传</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--文章展示 -->
            <div class="tab-pane fade" id="ios">
                <!--<table class="table table-bordered">-->
                <!--<thead>-->
                <!--<tr>-->
                <!--<th>-->
                <!--编号-->
                <!--</th>-->
                <!--<th>-->
                <!--产品-->
                <!--</th>-->
                <!--<th>-->
                <!--交付时间-->
                <!--</th>-->
                <!--<th>-->
                <!--状态-->
                <!--</th>-->
                <!--</tr>-->
                <!--</thead>-->
                <!--<tbody>-->
                <!--<tr>-->
                <!--<td>-->
                <!--1-->
                <!--</td>-->
                <!--<td>-->
                <!--TB - Monthly-->
                <!--</td>-->
                <!--<td>-->
                <!--01/04/2012-->
                <!--</td>-->
                <!--<td>-->
                <!--Default-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="success">-->
                <!--<td>-->
                <!--1-->
                <!--</td>-->
                <!--<td>-->
                <!--TB - Monthly-->
                <!--</td>-->
                <!--<td>-->
                <!--01/04/2012-->
                <!--</td>-->
                <!--<td>-->
                <!--Approved-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="error">-->
                <!--<td>-->
                <!--2-->
                <!--</td>-->
                <!--<td>-->
                <!--TB - Monthly-->
                <!--</td>-->
                <!--<td>-->
                <!--02/04/2012-->
                <!--</td>-->
                <!--<td>-->
                <!--Declined-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="warning">-->
                <!--<td>-->
                <!--3-->
                <!--</td>-->
                <!--<td>-->
                <!--TB - Monthly-->
                <!--</td>-->
                <!--<td>-->
                <!--03/04/2012-->
                <!--</td>-->
                <!--<td>-->
                <!--Pending-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="info">-->
                <!--<td>-->
                <!--4-->
                <!--</td>-->
                <!--<td>-->
                <!--TB - Monthly-->
                <!--</td>-->
                <!--<td>-->
                <!--04/04/2012-->
                <!--</td>-->
                <!--<td>-->
                <!--Call in to confirm-->
                <!--</td>-->
                <!--</tr>-->
                <!--</tbody>-->
                <!--</table>-->
            </div>
            <!--<div class="tab-pane fade" id="jmeter">-->
            <!--<p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>-->
            <!--</div>-->
            <!--<div class="tab-pane fade" id="ejb">-->
            <!--<p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。-->
            <!--</p>-->
            <!--</div>-->
        </div>

    </div>
</div>

<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jiathis_r.js?move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
<!-- UJian Button BEGIN -->
<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js?type=slide"></script>
<!-- UJian Button END -->

<script>
//    CKEDITOR.replace('news_content');
//    //如果是在ASP.NET环境下用的服务器端控 件<TextBox>
//    CKEDITOR.replace('tbContent');
//    //如 果<TextBox>控件在母版页中，要这样写
//    CKEDITOR.replace('<%=tbContent.ClientID.Replace("_","$") %>');
</script>


<script>

    $(document).ready(function(){
        $("#load").click(function(){
            alert("开始Ajax");
            $.ajax({
                url: "http://localhost/xinminnews/web/index.php?r=news/upload",
                data: {
                    news_title:$("#news_title").val(),
                    news_summary:$("#news_summary").val(),
                    news_author:$("#news_author").val(),
                    news_category:$("#news_category").val(),
                    news_pic:$("#news_pic").val(),
                    news_content:$("#news_content").val()

                },
                dataType: "json",
                type:"post",
                success: function(data){
                    alert("okey");
                    // $('.container').empty();   //清空resText里面的所有内容
//                    var html = '';
//                    $.each(data, function (newsIndex, news) {
//                        html += '<div class="news"><h6>' + news['news_title']
//                        + ':</h6><p class="news_summary">' + news['news_summary']
//                        + '</p></div>';
//                    });
//                    $('.container').html(html);
                }
            });
            alert("结束ajax");
        });

    });

</script>



</body>
</html>