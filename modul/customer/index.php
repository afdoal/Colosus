<?php 

    /* mendefinisikan url */
    $url = BASE_URL."/modul/customer/db.php";
    
    //echo $_SERVER['SCRIPT_NAME'];

?>
<script type="text/javascript">
		var url;
                
                function doSearch(){
			$('#dg').datagrid('load',{
				
				namaCustomer:$('#namaCustomer').val(),
                                alamat:$('#alamat').val(),
                                email:$('#email').val(),
                                telepon:$('#telepon').val(),
                                area:$('#area').val()
			});
		}
                function getMobil(){
                        var row = $('#dg').datagrid('getSelected');
			$('#mob').datagrid('load',{
				idCust:row.idCustomer
				
			});
		}
                function getMobil2(){
                        var row = $('#dg').datagrid('getSelected');
			$('#mob').datagrid('load',{
				session:'<?php echo $_SESSION[uname]; ?>'
				
			});
		}
		function newCustomer(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Customer');
			$('#fm').form('clear');
                        url = '<?php echo BASE_URL; ?>modul/customer/db.php?act=new';
                        
		}
                function newMobil(){
			$('#dlg2').dialog('open').dialog('setTitle','Tambah Mobil');
			$('#fm2').form('clear');
			url = '<?php echo BASE_URL; ?>modul/customer/db.php?act=new';
		}
		function editCustomer(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Customer');
				$('#fm').form('load',row);
				url = '<?php echo BASE_URL; ?>modul/customer/db.php?act=update&id='+row.idCustomer;
			}
                        
		}
                function editMobil(){
			var row2 = $('#mob').datagrid('getSelected');
			if (row2){
				$('#dlg2').dialog('open').dialog('setTitle','Edit Mobil');
				$('#fm2').form('load',row2);
				url = '<?php echo BASE_URL; ?>modul/customer/db.php?act=update&id='+row2.idCustomer;
			}
                        
		}
		function saveCustomer(){
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
                function saveMobil(){
			$('#fm2').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg2').dialog('close');		// close the dialog
						$('#mob').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeCustomer(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Konfirmasi','Yakin ingin menghapus customer ini?',function(r){
					if (r){
						$.post('<?php echo BASE_URL; ?>modul/customer/db.php',{act:'hapus',idModul:row.idModul},function(result){
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
                function removeMobil(){
			var row = $('#mob').datagrid('getSelected');
			if (row){
				$.messager.confirm('Konfirmasi','Yakin ingin menghapus mobil ini?',function(r){
					if (r){
						$.post('<?php echo BASE_URL; ?>modul/customer/db.php',{act:'hapusmobil',idModul:row.idModul},function(result){
							if (result.success){
								$('#mob').datagrid('reload');	// reload the user data
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
<table id="dg" title="Data Customer" class="easyui-datagrid" style="width:auto;height:500px;"  
        url="<?php echo $url;?>"  
        toolbar="#toolbar" 
        pageSize="20"
        rownumbers="true" fitColumns="true" singleSelect="true"
        pagination="true">  
    <thead>  
        <tr>  
            <th field="NoIDCust" width="50" sortable="true">ID Customer</th> 
            <th field="namaCustomer" width="50" sortable="true">Nama Customer</th>
            <th field="alamatCustomer" width="50" sortable="true">Alamat</th>
             <th field="telpCustomer" width="50" sortable="true">No Telepon</th>
             <th field="email" width="50" sortable="true">Email</th>
              <th field="area" width="50" sortable="true">Area</th>
              
        </tr>  
    </thead>  
</table>  
<div id="toolbar">  
    Nama : <input id="namaCustomer" style="line-height:16px;border:1px solid #ccc">  
    
    Email :<input id="email" style="line-height:16px;width:80px;border:1px solid #ccc">
    No Telepon :<input id="telepon" style="line-height:16px;width:80px;border:1px solid #ccc">
    Alamat :<input id="alamat" style="line-height:16px;border:1px solid #ccc">
    Area :<input id="area" style="line-height:16px;border:1px solid #ccc">
    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Cari</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newCustomer();getMobil2()">Tambah Customer</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editCustomer();getMobil()">Edit Customer</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeCustomer()">Hapus Customer</a>  
</div>

<div id="dlg" class="easyui-dialog" style="width:600px;height:580px;padding:10px 20px"  
        closed="true" buttons="#dlg-buttons">  
    <div class="ftitle">Data Customer</div>  
    <form id="fm" method="post">  
        <input type="hidden" name="idCustomer" class="easyui-validatebox" style="width:469px;"> 
        <div class="fitem">  
            <label >Nama Customer:</label>  
            <input name="namaCustomer" class="easyui-validatebox" style="width:469px;" required="true">  
        </div>  
        <div class="fitem">  
            <label>Email:</label>  
            <input name="email" class="easyui-validatebox" style="width:469px;" required="true">  
        </div>  
        <div class="fitem">  
            <label>No Telpon: </label>  
            <input name="telpCustomer" class="easyui-validatebox" style="width:469px;" >  
        </div>  
        <div class="fitem">  
            <label>Area</label>  
           <input class="easyui-combobox" 
			style="width:469px;" name="area"
			data-options="
					url:'<?php echo BASE_URL; ?>modul/customer/db.php?act=region',
					valueField:'nama',
					textField:'nama',
					multiple:false,
					panelHeight:'auto'
			">
        </div>
        <div class="fitem">  
            <label style="float:left;">Alamat : </label>  
            <textarea name="alamatCustomer" class="easyui-validatebox" style="height:150px;width:469px;" ></textarea>  
        </div> 
         <div class="fitem">
        <table id="mob" title="Data Mobil" class="easyui-datagrid" style="width:auto;height:300px;"  
        url="<?php echo $url.'?act=mobil';?>"  
        toolbar="#toolbar2" 
        pageSize="20"
        rownumbers="true" fitColumns="true" singleSelect="true"
        pagination="true">  
    <thead>  
        <tr>  
            <th field="noMobil" width="50" sortable="true">No Mobil</th> 
            <th field="keterangan" width="50" sortable="true">Keterangan</th>
            <th field="tahun" width="50" sortable="true">Tahun</th>
             <th field="merk" width="50" sortable="true">Merk</th>
             
              
        </tr>  
    </thead>  
</table>
 
         </div> 
         
    </form>  
</div>
<div id="toolbar2">  
    
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMobil()">Tambah Mobil</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMobil()">Edit Mobil</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeMobil()">Hapus Mobil</a>  
</div>
<div id="dlg2" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"  
        closed="true" buttons="#dlg-buttons2">  
    <div class="ftitle">Informasi Mobil</div>  
    <input type="hidden" name="idCustomer" class="easyui-validatebox" style="width:469px;"> 
    <form id="fm2" method="post">  
        <div class="fitem">  
            <label>No Mobil:</label>  
            <input name="noMobil" class="easyui-validatebox" required="true">  
        </div>  
        <div class="fitem">  
            <label>Keterangan:</label>  
            <input name="keterangan" class="easyui-validatebox">  
        </div>  
        <div class="fitem">  
            <label>Tahun:</label>  
            <input name="tahun">  
        </div>  
        <div class="fitem">  
            <label>Merk:</label>  
            <input name="merk" class="easyui-validatebox">  
        </div>  
    </form>  
</div> 
<div id="dlg-buttons2">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveMobil()">Save</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg2').dialog('close')">Cancel</a>  
</div>      
<div id="dlg-buttons">  
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveCustomer()">Save</a>  
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>  
</div>  
</div>
