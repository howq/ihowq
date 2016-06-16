<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:28
 */
?>
<!--Tag-->
<table id="toolbar" id="actions" style="width:320px; margin-bottom: 10px">
    <tr>
        <td style="width:100%;">
            <a class="easyui-linkbutton" onclick="addRow()" data-options="iconCls:'icon-add'">增加</a>
            <a class="easyui-linkbutton" onclick="editRow()" data-options="iconCls:'icon-edit'">修改</a>
            <a class="easyui-linkbutton" onclick="removeit()" data-options="iconCls:'icon-remove'">删除</a>

            <span style="margin-left: 20px;font-weight: bold">选择模式</span>
            <select onchange="$('#grid-tag').datagrid({singleSelect:(this.value==0)})">
                <option value="0">单选</option>
                <option value="1">多选</option>
            </select>
        </td>
    </tr>
</table>

<!--toolbar="#toolbar"-->
<table id="grid-tag" title="标签编辑" class="easyui-datagrid" style="width: 320px" data-options="
                url:'index.php?r=site/tag',
                method:'get',
                singleSelect:true,
                collapsible:true,
                iconCls:'icon-edit',
			    pagination:true,
			    pageSize:10">
    <thead>
    <tr>
        <th data-options="field:'ck',checkbox:true"></th>
        <th data-options="field:'tag_id',width:0" class="hidden"></th>
        <th data-options="field:'tag_name',width:100">标签名</th>
    </tr>
    </thead>
</table>

<script>
    function removeit(){
        if (editIndex == undefined){return}
        $('#dg').datagrid('cancelEdit', editIndex)
            .datagrid('deleteRow', editIndex);
        editIndex = undefined;
    }
</script>

<script>
    $.parser.parse();

    var pager = $('#grid-tag').datagrid('getPager');    // get the pager of datagrid
    pager.pagination({
        showPageList:true,
    });
    $.extend($.fn.datagrid.defaults.editors, {
        text: {
            init: function(container, options){
                var input = $('<input type="text" class="datagrid-editable-input">').appendTo(container);
                return input;
            },
            getValue: function(target){
                return $(target).val();
            },
            setValue: function(target, value){
                $(target).val(value);
            },
            resize: function(target, width){
                var input = $(target);
                if ($.boxModel == true){
                    input.width(width - (input.outerWidth() - input.width()));
                } else {
                    input.width(width);
                }
            }
        }
    });

    $('#grid-tag').datagrid({
        onDblClickCell: function(index,field,value){
            $('#grid-tag').datagrid('beginEdit', index);
            var ed = $('#grid-tag').datagrid('getEditor', {index:index,field:field});
            var edi = $('#grid-tag').datagrid('getEditor', {index:1,field:field});
            $(edi.target).textbox('setValue', '5/4/2012');

            alert(a);
        }
    });

</script>

<script>
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
            url: "index.php?r=site/tag",
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

        $('#grid-tag').datagrid().datagrid('clientPaging');
    });
</script>