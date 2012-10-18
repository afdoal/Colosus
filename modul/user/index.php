<?php 

    /* mendefinisikan url */
    $url = BASE_URL."modul/user/db.php";
    
    //echo $_SERVER['SCRIPT_NAME'];

?>
<script type="text/javascript">
		var url;
                
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah User Baru');
			$('#fm').form('clear');
			url = '<?php echo BASE_URL; ?>modul/user/save_user.php';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = '<?php echo BASE_URL; ?>modul/user/update_user.php?id='+row.idUser;
			}
                        
		}
		function saveUser(){
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
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin ingin menghapus user ini?',function(r){
					if (r){
						$.post('<?php echo BASE_URL; ?>modul/user/db.php',{act:'hapus',idUser:row.idUser},function(result){
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
<table id="dg" title="Manajemen User" class="easyui-datagrid" style="width:auto;height:500px;"  
        url="<?php echo $url;?>"  
        toolbar="#toolbar"  
        rownumbers="true" fitColumns="true" singleSelect="true"
        pagination="true">  
    <thead>  
        <tr>  
            <th field="namaUser" width="50">Nama User</th> 
            <th field="uname" width="50">Username</th>
            <th field="email" width="50">Email</th> 
             <th field="levelUser" width="50">Level</th>  
              
        </tr>  
    </thead>  
</table>  
<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Tambah User</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">Hapus User</a>  
</div>
<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"  
        closed="true" buttons="#dlg-buttons">  
    <div class="ftitle">User Information</div>  
    <form id="fm" method="post">  
        <input type="hidden" name="idUser" class="easyui-validatebox"> 
        <div class="fitem">  
            <label>Nama User:</label>  
            <input name="namaUser" class="easyui-validatebox" required="true">  
        </div>  
        <div class="fitem">  
            <label>Username:</label>  
            <input name="uname" class="easyui-validatebox" required="true">  
        </div>  
        <div class="fitem">  
            <label>Password:</label>  
            <input name="password" class="easyui-validatebox" value="">  
        </div>  
        <div class="fitem">  
            <label>Level User</label>  
           <input class="easyui-combobox" 
			name="levelUser"
			data-options="
					url:'<?php echo BASE_URL; ?>modul/user/db.php?act=list',
					valueField:'idLevelUser',
					textField:'levelUser',
					multiple:false,
					panelHeight:'auto'
			">
        </div>  
        <div class="fitem">  
            <label>Email:</label>  
            <input name="email" class="easyui-validatebox" validType="email">  
        </div>  
    </form>  
</div>  
<div id="dlg-buttons">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Save</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>  
</div>  
</div>
