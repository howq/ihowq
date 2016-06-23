<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:28
 */
?>
<!--News-->

<table class="toolbar" id="actions" style="width:700px; margin-bottom: 10px">
    <tr>
        <td style="width:100%;">
            <a class="easyui-linkbutton" onclick="addNews()" data-options="iconCls:'icon-add'">增加</a>
            <a class="easyui-linkbutton" onclick="editNews()" data-options="iconCls:'icon-edit'">修改</a>
            <a class="easyui-linkbutton" onclick="removeNews()" data-options="iconCls:'icon-remove'">删除</a>

            <span style="margin-left: 20px;font-weight: bold">选择模式</span>
            <select onchange="$('#grid-news').datagrid({singleSelect:(this.value==0)})" id="mode">
                <option value="0">单选</option>
                <option value="1">多选</option>
            </select>
        </td>
    </tr>
</table>

<!--url:'index.php?r=site/news',-->

<table id="grid-news" title="文章编辑" class="easyui-datagrid" style="width: 1030px" data-options="
               url:'index.php?r=site/news',
               method:'get',
               singleSelect:true,
               collapsible:true,
               iconCls:'icon-edit',
			   pagination:true,
			   pageSize:10">
    <thead>
    <tr>
        <th data-options="field:'ck',checkbox:true"></th>
        <th data-options="field:'news_id',width:0" class="hidden"></th>
        <th data-options="field:'news_title',width:400">标题</th>
        <th data-options="field:'news_author',width:200,align:'right'">作者</th>
        <th data-options="field:'news_category',width:150,align:'right'">目录</th>
        <th data-options="field:'news_editor',width:100">编辑</th>
        <th data-options="field:'news_date',width:150,align:'center'">日期</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">

    function addNews(){
        window.open("index.php?r=site/addnews");
    }

    function editNews(){
        if(check.isOkAlter()){
            window.open("index.php?r=site/addnews&news_id="+check.editId);
        }
    }
    function removeNews(){
        var data = $("#grid-news").datagrid('getSelected');
        var index=$('#grid-news').datagrid('getRowIndex',data);
        $('#grid-news').datagrid('deleteRow',index);
        $.ajax({
            url:"index.php?r=site/remove_news",
            type:'POST',
            data:{
                news_id:data.news_id
            },
            success: function (data) {
                if('success'==data){
                    alert('删除成功!');
                }
                else if('fail'==data){
                    alert('删除失败!');
                }
            },
            error: function () {
                alert("服务器内部出错，删除失败!");
            }
        });
    }

    var check = {
        editId:null,
        isOkAlter:function(){
            if(1==$('#mode').val()){
                alert('修改仅限于单篇文章，请重新选择模式!');
                return false;
            }
            var row = $('#grid-news').datagrid('getSelected');
            if(null==row){
                alert('请选择修改文章!');
                return false;
            }
            else {
                this.editId = row.news_id;
                return true;
            }
        }
    };

</script>

<script type="text/javascript">
    (function($){
        function pagerFilter(data){
            if ($.isArray(data)){	// is array
                data = {
                    total: data.length,
                    rows: data
                }
            }
            var target = this;
            var dg = $(target);
            var state = dg.data('datagrid');
            var opts = dg.datagrid('options');
            if (!state.allRows){
                state.allRows = (data.rows);
            }
            if (!opts.remoteSort && opts.sortName){
                var names = opts.sortName.split(',');
                var orders = opts.sortOrder.split(',');
                state.allRows.sort(function(r1,r2){
                    var r = 0;
                    for(var i=0; i<names.length; i++){
                        var sn = names[i];
                        var so = orders[i];
                        var col = $(target).datagrid('getColumnOption', sn);
                        var sortFunc = col.sorter || function(a,b){
                                return a==b ? 0 : (a>b?1:-1);
                            };
                        r = sortFunc(r1[sn], r2[sn]) * (so=='asc'?1:-1);
                        if (r != 0){
                            return r;
                        }
                    }
                    return r;
                });
            }
            var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
            var end = start + parseInt(opts.pageSize);
            data.rows = state.allRows.slice(start, end);
            return data;
        }

        var loadDataMethod = $.fn.datagrid.methods.loadData;
        var deleteRowMethod = $.fn.datagrid.methods.deleteRow;
        $.extend($.fn.datagrid.methods, {
            clientPaging: function(jq){
                return jq.each(function(){
                    var dg = $(this);
                    var state = dg.data('datagrid');
                    var opts = state.options;
                    opts.loadFilter = pagerFilter;
                    var onBeforeLoad = opts.onBeforeLoad;
                    opts.onBeforeLoad = function(param){
                        state.allRows = null;
                        return onBeforeLoad.call(this, param);
                    }
                    var pager = dg.datagrid('getPager');
                    pager.pagination({
                        onSelectPage:function(pageNum, pageSize){
                            opts.pageNumber = pageNum;
                            opts.pageSize = pageSize;
                            pager.pagination('refresh',{
                                pageNumber:pageNum,
                                pageSize:pageSize
                            });
                            dg.datagrid('loadData',state.allRows);
                        }
                    });
                    $(this).datagrid('loadData', state.data);
                    if (opts.url){
                        $(this).datagrid('reload');
                    }
                });
            },
            loadData: function(jq, data){
                jq.each(function(){
                    $(this).data('datagrid').allRows = null;
                });
                return loadDataMethod.call($.fn.datagrid.methods, jq, data);
            },
            deleteRow: function(jq, index){
                return jq.each(function(){
                    var row = $(this).datagrid('getRows')[index];
                    deleteRowMethod.call($.fn.datagrid.methods, $(this), index);
                    var state = $(this).data('datagrid');
                    if (state.options.loadFilter == pagerFilter){
                        for(var i=0; i<state.allRows.length; i++){
                            if (state.allRows[i] == row){
                                state.allRows.splice(i,1);
                                break;
                            }
                        }
                        $(this).datagrid('loadData', state.allRows);
                    }
                });
            },
            getAllRows: function(jq){
                return jq.data('datagrid').allRows;
            }
        })
    })(jQuery);

    function getData(){
        $.ajax({
            url: "index.php?r=site/news",
            data: {},
            dataType: "json",
            type:"post",
            success: function(data){
                myData = data['rows'];
            },
            error:function(){
                alert("加载数据失败，请刷新重试!");
            }
        });
    }

    $(function(){
        $('#grid-news').datagrid().datagrid('clientPaging');
    });
</script>