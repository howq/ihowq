<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:28
 */
?>

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
            <div class="form-group col-md-12"  style="padding: 0 30px;">
                <textarea id="news_content" cols="20" rows="2" class="ckeditor col-md-12"></textarea>
            </div>


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
                        data-options="url:'index.php?r=site/category',required:false">
                </select>
            </div>

            <div class="form-group col-md-12" style="padding: 0 30px;">
                <label class="col-md-12 control-label">标签</label>
                <input id="news_tags" class="easyui-combobox" name="dept" style="width:100%"
                       data-options="valueField:'tag_id',textField:'tag_name',url:'index.php?r=site/tag&choosetag=1',multiple:true" />
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
    </form>
    <div class="form-group col-md-12" style="margin-top: 10px;margin-right: 5px">
        <div class="col-md-offset-11 col-md-1">
            <button type="submit" class="btn btn-success btn-lg" id="upload" onclick="saveData()">上传</button>
        </div>
    </div>



</div>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'news_content' );
    CKFinder.setupCKEditor( editor );               //CKeditor

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
        var t = $('#news_category').combotree('tree'); // 得到树对象
        var n = t.tree('getSelected'); // 得到选择的节点
        if(null!=n){
            var categoryId = n.id;
        }
        var tags = $("#news_tags").combobox("getText");

        $.ajax({
            url: "index.php?r=site/save&type=news",
//            dataType: "json",
            type: "post",
            data: {
                news_title: $("#news_title").val(),
                news_sump: $("#news_sump").val(),
                news_summary: $("#news_summary").val(),
                news_pic: $("#news_pic").val(),
                news_content: editor.getData(),
                news_author: $("#news_author").val(),
                news_editor: $("#news_editor").val(),
                news_category: categoryId,
                news_tags: tags,
                news_source: $("#news_source").val(),
                news_url: $("#news_url").val(),
            },
            success: function (data) {
                if('success'==data){
                    alert('上传成功!');
                    document.getElementById("form").reset();
                    editor.setData("");
                }
                else if('fail'==data){
                    alert('上传格式错误!');
                }
            },
            error: function () {
                alert("服务器内部出错，上传失败!");
            }
        });
    }

</script>

</body>
</html>

