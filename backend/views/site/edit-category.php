<?php
/**
 * Created by PhpStorm.
 * User: buzhi
 * Date: 2016/3/12
 * Time: 23:28
 */
?>

<!--Category-->
<table class="toolbar" id="actions" style="width:700px; margin-bottom: 10px">
    <tr>
        <td style="width:100%;">
            <a class="easyui-linkbutton" onclick="addRow()" data-options="iconCls:'icon-add'">增加父目录</a>
            <a class="easyui-linkbutton" onclick="editRow()" data-options="iconCls:'icon-edit'">增加子目录</a>
            <a class="easyui-linkbutton" onclick="removeRow()" data-options="iconCls:'icon-remove'">删除</a>

<!--            <span style="margin-left: 20px;font-weight: bold">选择模式</span>-->
<!--            <select onchange="$('#grid-tag').datagrid({singleSelect:(this.value==0)})">-->
<!--                <option value="0">单选</option>-->
<!--                <option value="1">多选</option>-->
<!--            </select>-->
        </td>
    </tr>
</table>

<div id="edit-catogory" title="目录编辑" class="easyui-panel" style="padding:5px;width: 200px" data-options="iconCls:'icon-edit',collapsible:true,">
    <ul id="tt" class="easyui-tree" data-options="url:'admin.php?r=site/category',method:'get',animate:true"></ul>
</div>

<script>


</script>
