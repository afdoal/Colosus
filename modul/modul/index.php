<?php 

    /* mendefinisikan url */
    $url = BASE_URL."/modul/modul/db.php";
    
    //echo $_SERVER['SCRIPT_NAME'];

?>
<script>
		var url;
                
		function newModul(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Modul');
			$('#fm').form('clear');
			url = '<?php echo BASE_URL; ?>modul/modul/db.php?act=new';
		}
		function editModul(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Modul');
				$('#fm').form('load',row);
				url = '<?php echo BASE_URL; ?>modul/modul/db.php?act=update&id='+row.id;
			}
                        
		}
		function saveModul(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeModul(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Konfirmasi','Yakin ingin menghapus modul ini?',function(r){
					if (r){
						$.post('<?php echo BASE_URL; ?>modul/modul/db.php',{act:'hapus',idModul:row.idModul},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
                        
		}
                
	</script>
<div style="width:auto;margin:0 auto;">
<table id="dg" title="Manajemen Modul" class="easyui-datagrid" style="width:auto;height:500px;"  
        url="<?php echo $url;?>"  
        toolbar="#toolbar"
        pageSize="20"
        rownumbers="true" fitColumns="true" singleSelect="true"
        pagination="true">  
    <thead>  
        <tr>  
            <th field="namaModul" width="50">Nama Modul</th> 
            <th field="link" width="50">Link Modul</th>
            <th field="publish" width="50">Published?</th> 
             <th field="levelUser" width="50">Hak Akses</th>  
              
        </tr>  
    </thead>  
</table>  
<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newModul()">Tambah Modul</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editModul()">Edit Modul</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeModul()">Hapus Modul</a>  
</div>
<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"  
        closed="true" buttons="#dlg-buttons">  
    <div class="ftitle">Module Information</div>  
    <form id="fm" method="post">  
        <input type="hidden" name="idModul" class="easyui-validatebox"> 
        <div class="fitem">  
            <label>Nama Modul:</label>  
            <input name="namaModul" class="easyui-validatebox" required="true">  
        </div>  
        <div class="fitem">  
            <label>Link:</label>  
            <input name="link" class="easyui-validatebox" required="true">  
        </div>  
        <div class="fitem">  
            <label>Published: <i>*Y/N</i></label>  
            <input name="publish" class="easyui-validatebox" value="">  
        </div>  
        <div class="fitem">  
            <label>Level User</label>  
           <input class="easyui-combobox" 
			name="levelUser"
			data-options="
					url:'<?php echo BASE_URL; ?>modul/modul/db.php?act=list',
					valueField:'idLevelUser',
					textField:'levelUser',
					multiple:false,
					panelHeight:'auto'
			">
        </div>  
        
    </form>  
</div>  
<div id="dlg-buttons">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveModul()">Save</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>  
</div>  
</div>
