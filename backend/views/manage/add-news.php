<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:28
 */
use yii\helpers\Url;
?>

<link rel="stylesheet" href="<?=yii::$app->homeUrl."../".CommonConfig::COMMON_LIB?>/editor/css/editormd.css" />
<link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />

<style type="text/css">
    textarea{
        height: 10vh;
    }
    #edit-main{
        /*border-right: solid darkseagreen;*/
    }
    .col-md-1.control-label{
        padding-right: 0!important;
    }
</style>

<div id="edit" class="col-md-11">
    <form id="form" method="post" class="col-md-12">
        <div id="edit-main" class="col-md-9">
            <div class="form-group col-md-12">
                <label class="col-md-1 control-label">标题</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" id="news_title" maxlength="40" placeholder="标题">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-1 control-label">摘要P</label>
                <div class="col-md-11">
                    <textarea class="form-control" id="news_sump" placeholder="手机端摘要" maxlength="80"></textarea>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-1 control-label">摘要</label>
                <div class="col-md-11">
                    <textarea class="form-control" id="news_summary" placeholder="摘要" maxlength="120"></textarea>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-1 control-label">图片</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" id="news_pic" maxlength="100" placeholder="首页图片URL">
                </div>
            </div>

<!--            CKeditor编辑器-->
<!--            <div class="form-group col-md-12"  style="padding: 0 30px;">-->
<!--                <textarea id="news_content" cols="20" rows="2" class="ckeditor col-md-12"></textarea>-->
<!--            </div>-->


        </div>
        <div id="edit-minor" class="col-md-3">
            <div class="form-group col-md-12">
                <label class="col-md-12 control-label" style="margin-left: 15px">作者</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="news_author" maxlength="20" placeholder="文章作者">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-12 control-label" style="margin-left: 15px">编辑</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="news_editor" maxlength="10" placeholder="责任编辑">
                </div>
            </div>

            <div class="form-group col-md-12" style="padding: 0 30px;">
                <label class="col-md-12 control-label">目录</label>
                <select id="news_category" class="easyui-combotree col-md-12" style="width:100%"
                        data-options="url:'<?=Url::toRoute(['manage/category'])?>',required:false">
                </select>
            </div>

            <div class="form-group col-md-12" style="padding: 0 30px;">
                <label class="col-md-12 control-label">标签</label>
                <input id="news_tags" class="easyui-combobox" name="dept" style="width:100%"
                       data-options="valueField:'tag_id',textField:'tag_name',url:'<?=Url::toRoute(['manage/tag','choosetag' => 1 ])?>',multiple:true" />
            </div>

            <div class="form-group col-md-12">
                <label class="col-md-12 control-label" style="margin-left: 15px">来源</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="news_source" maxlength="10" placeholder="文章来源">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="col-md-12 control-label" style="margin-left: 15px">网址</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="news_url" maxlength="50" placeholder="来源网址">
                </div>
            </div>
        </div>
        <!--            MarkDown编辑器-->
        <div class="col-md-12">
            <div class="btns">
                <input id="goto-line-btn" type="button" value="Goto line 90">
                <input id="show-btn" type="button" value="Show editor">
                <input id="hide-btn" type="button" value="Hide editor">
                <input id="get-md-btn" type="button" value="Get Markdown">
                <input id="get-html-btn" type="button" value="Get HTML">
                <input id="watch-btn" type="button" value="Watch">
                <input id="unwatch-btn" type="button" value="Unwatch">
                <input id="preview-btn" type="button" value="Preview HTML (Press Shift + ESC cancel)">
                <input id="fullscreen-btn" type="button" value="Fullscreen (Press ESC cancel)">
                <input id="show-toolbar-btn" type="button" value="Show toolbar">
                <input id="close-toolbar-btn" type="button" value="Hide toolbar">
                <input id="toc-menu-btn" type="button" value="ToC Dropdown menu">
                <input id="toc-default-btn" type="button" value="ToC default">

<!--                <button id="goto-line-btn">Goto line 90</button>-->
<!--                <button id="show-btn">Show editor</button>-->
<!--                <button id="hide-btn">Hide editor</button>-->
<!--                <button id="get-md-btn">Get Markdown</button>-->
<!--                <button id="get-html-btn">Get HTML</button>-->
<!--                <button id="watch-btn">Watch</button>-->
<!--                <button id="unwatch-btn">Unwatch</button>-->
<!--                <button id="preview-btn">Preview HTML (Press Shift + ESC cancel)</button>-->
<!--                <button id="fullscreen-btn">Fullscreen (Press ESC cancel)</button>-->
<!--                <button id="show-toolbar-btn">Show toolbar</button>-->
<!--                <button id="close-toolbar-btn">Hide toolbar</button>-->
<!--                <button id="toc-menu-btn">ToC Dropdown menu</button>-->
<!--                <button id="toc-default-btn">ToC default</button>-->
            </div>
            <div id="news_content"></div>

        </div>
    </form>
    <div class="form-group col-md-12" style="margin-top: 10px;margin-right: 5px">
        <div class="col-md-offset-11 col-md-1">
            <button type="submit" class="btn btn-success btn-lg" id="upload" onclick="saveData()">上传</button>
        </div>
    </div>

</div>

<script src="<?=yii::$app->homeUrl."../".CommonConfig::COMMON_LIB?>/editor/editormd.min.js"></script>


<script type="text/javascript">
    var content = "";
    var page = {
        news_id:-1,
        type:0,     //0表示添加 1表示修改
        Init:function () {
            var url = window.location.href;
            var str1 = url.split('&');
            if(2==str1.length){
                this.type=1;
                var str2 = str1[1].split('=');
                this.news_id = str2[1];
                this.LoadEditNews();
            }
        },
        LoadEditNews:function () {
            $.ajax({
                url:"admin.php?r=manage/load_news&news_id="+this.news_id,
                type:'POST',
                data:{
                    news_id:this.news_id
                },
                success: function (data) {
                    var news_tags = JSON.parse(data);
                    var newsArr = JSON.parse(news_tags['news']);
                    var tagObj = JSON.parse(news_tags['tags']);     //标签对象数组

                    $('#news_title').val(newsArr['news_title']);
                    $('#news_sump').val(newsArr['news_sump']);
                    $('#news_summary').val(newsArr['news_summary']);
                    $('#news_pic').val(newsArr['news_pic']);

                    $('#news_author').val(newsArr['news_author']);
                    $('#news_editor').val(newsArr['news_editor']);
                    $('#news_source').val(newsArr['news_source']);
                    $('#news_url').val(newsArr['news_url']);
                    //目录和标签需调整
                    $('#news_category').combotree({
                        onLoadSuccess:function (data) {
                            $('#news_category').combotree('setValue',newsArr['news_category']);
                        }
                    });

                    if(0!=tagObj.length){
                        var i;
                        var tagArr = new Array();
                        for(i=0;i<tagObj.length;i++){
                            tagArr.push(tagObj[i]['tag_id']);
                        }

                        $('#news_tags').combobox({
                            onLoadSuccess:function (data) {
                                $('#news_tags').combobox("setValues",tagArr);
                            }
                        });
                    }
                    content =newsArr['news_content'];
//                    testEditor.setMarkdown(newsArr['news_content']);
//                    editor.setData(newsArr['news_content']);
//                    $('#news_content').val(newsArr['news_content']);
                },
                error: function () {
                    alert("加载数据失败!");
                }
            });
        }
    }

//    var editor = CKEDITOR.replace( 'news_content' );
//    CKFinder.setupCKEditor( editor );               //CKeditor



    var right = {        //内容字数结构体
        title:12,
        content:14,
        line:4
    }

    var check = {
        ts:function(){      //检查title summury 字数限制
            var t = $('#news_title').val().length;
            var s = $('#news_summary').val().length;
            var level = 2;
            if(t<right.title+1){
                level = 1;
            }
            if(s>right.content*(right.line-level)){
                alert('标题和摘要字数过多，请修改！');
                return false;
            }
            return true;
        }
    }

    function saveData() {
//        if(!check.ts()){
//            return;
//        }
        var md_content = testEditor.getMarkdown();
        var html_content = testEditor.getHTML();

        var t = $('#news_category').combotree('tree'); // 得到树对象
        var n = t.tree('getSelected'); // 得到选择的节点
        if(null!=n){
            var categoryId = n.id;
        }
        var tags = $("#news_tags").combobox("getText");
        var tagValues = $("#news_tags").combobox("getValues");
        $.ajax({
            url: "<?=Url::toRoute(['manage/save_news'])."?type="?>"+page.type,
//            dataType: "json",
            type: "post",
            data: {
                news_id:page.news_id,
                news_title: $("#news_title").val(),
                news_sump: $("#news_sump").val(),
                news_summary: $("#news_summary").val(),
                news_pic: $("#news_pic").val(),
                news_content: md_content,
//                news_content: editor.getData(),
                news_author: $("#news_author").val(),
                news_editor: $("#news_editor").val(),
                news_category: categoryId,
                news_tags: tagValues,
                news_source: $("#news_source").val(),
                news_url: $("#news_url").val(),
            },
            success: function (data) {
                if('success'==data){
                    alert('上传成功!');
                    document.getElementById("form").reset();
                //    editor.setData("");
                    if(page.type){
                        CloseWebPage();
                    }
                }
                else if('fail'==data){
                    alert('上传格式错误!');
                }
            },
            error: function(xhr){alert('动态页出错\n\n'+xhr.responseText);}///////////增加错误回调，看什么问题
            
        });
    }

    function CloseWebPage(){
        if (navigator.userAgent.indexOf("MSIE") > 0) {
            if (navigator.userAgent.indexOf("MSIE 6.0") > 0) {
                window.opener = null;
                window.close();
            } else {
                window.open('', '_top');
                window.top.close();
            }
        }
        else if (navigator.userAgent.indexOf("Firefox") > 0) {
            window.location.href = 'about:blank ';
        } else {
            window.opener = null;
            window.open('', '_self', '');
            window.close();
        }
    }

    page.Init();
</script>

<script type="text/javascript">

    var testEditor;

    $(function() {

        $.get('../test.md', function(md){
            testEditor = editormd("news_content", {
                width: "90%",
                height: 740,
                path : '../../common/lib/editor/lib/',
                theme : "dark",
                previewTheme : "dark",
                editorTheme : "pastel-on-dark",
                markdown : md,
                codeFold : true,
                //syncScrolling : false,
                saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
                searchReplace : true,
                watch : false,                // 关闭实时预览
                htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
                //toolbar  : false,             //关闭工具栏
                //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                emoji : true,
                taskList : true,
                tocm            : true,         // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                imageUpload : false,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : "./php/upload.php",
                onload : function() {
//                    console.log('onload', this);
                    //this.fullscreen();
                    //this.unwatch();
                    //this.watch().fullscreen();

                    this.setMarkdown(content);
                    //this.width("100%");
                    //this.height(480);
                    //this.resize("100%", 640);
                }
            });
        });

        $("#goto-line-btn").bind("click", function(){
            testEditor.gotoLine(90);
        });

        $("#show-btn").bind('click', function(){
            testEditor.show();
        });

        $("#hide-btn").bind('click', function(){
            testEditor.hide();
        });

        $("#get-md-btn").bind('click', function(){
            alert(testEditor.getMarkdown());
        });

        $("#get-html-btn").bind('click', function() {
            alert(testEditor.getHTML());
        });

        $("#watch-btn").bind('click', function() {
            testEditor.watch();
        });

        $("#unwatch-btn").bind('click', function() {
            testEditor.unwatch();
        });

        $("#preview-btn").bind('click', function() {
            testEditor.previewing();
        });

        $("#fullscreen-btn").bind('click', function() {
            testEditor.fullscreen();
        });

        $("#show-toolbar-btn").bind('click', function() {
            testEditor.showToolbar();
        });

        $("#close-toolbar-btn").bind('click', function() {
            testEditor.hideToolbar();
        });

        $("#toc-menu-btn").click(function(){
            testEditor.config({
                tocDropdown   : true,
                tocTitle      : "目录 Table of Contents",
            });
        });

        $("#toc-default-btn").click(function() {
            testEditor.config("tocDropdown", false);
        });
    });
</script>

</body>
</html>

