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

</form>
<div class="form-group" style="margin-top: 10px;margin-right: 5px">
    <div class="col-sm-offset-11 col-sm-1">
        <button type="submit" class="btn btn-success btn-lg" id="upload">上传</button>
    </div>
</div>