<style type="text/css">
	.switch-field {
		display: flex;
		/*margin-bottom: 36px;*/
		overflow: hidden;
	}

	.switch-field input {
		position: absolute !important;
		clip: rect(0, 0, 0, 0);
		height: 1px;
		width: 1px;
		border: 0;
		overflow: hidden;
	}

	.switch-field label {
		background-color: #e4e4e4;
		color: rgba(0, 0, 0, 0.6);
		font-size: 14px;
		line-height: 1;
		text-align: center;
		padding: 8px 16px;
		margin-right: -1px;
		border: 1px solid rgba(0, 0, 0, 0.2);
		box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
		transition: all 0.1s ease-in-out;
	}

	.switch-field label:hover {
		cursor: pointer;
	}

	.switch-field input:checked + label {
		background-color: #a5dc86;
		box-shadow: none;
	}

	.switch-field label:first-of-type {
		border-radius: 4px 0 0 4px;
	}

	.switch-field label:last-of-type {
		border-radius: 0 4px 4px 0;
	}
</style>

<?php if (uri_string()=='level/indeks') { ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-warning btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-primary btn-xs">Menu Privilege</a>
    </div>
<?php }else if(uri_string()=='role/indeks') { ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-primary btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-warning btn-xs">Menu Privilege</a>
    </div>
<?php }else{ ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-primary btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-primary btn-xs">Menu Privilege</a>
    </div>
<?php } ?>
<hr>
<div class="col-md-12 mb-3">
	<div class="card">
        <div class="card-body">
            <h4 class="card-title">Role
            	<button type="button" id="submit" class="btn btn-primary btn-xs float-right" onclick="sendData()">Tambah</button>
            </h4>
            <h6 class="card-subtitle">Menu Privilage</h6>
            <div class="col-md-12">
            	<table class="table">
            		<tr>
            			<th>
            				Modul
            			</th>
            			<th class="text-center">
            				Level
            			</th>
            			<th class="text-center">
            				Akses I/O
            			</th>
            		</tr>
            		<tr>
            			<form class="roleMenu">
	            			<td wi dth="200">
	            				<input type="text" name="module" class="form-control" placeholder="nama modul">
	            			</td>
	            			<td width="200" class="text-center">
	            				<select class="form-control" name="level">
	            					<?php foreach ($level as $key => $value) {
	            						echo "<option value='$value[id_level]'> $value[nama_level] </option>";
	            					} ?>
	            				</select>
	            			</td>
	            			<td>
	            				<div class="switch-field mx-auto">
									<input type="radio" id="akses001" name="akses001" value="1" />
									<label for="akses001" class="ml-auto">I</label>
									<input type="radio" id="akses000" name="akses001" value="0" checked />
									<label for="akses000" class="mr-auto">O</label>
								</div>
	            			</td>
	            		</form>
            		</tr>
            	</table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
	<div class="card">
        <div class="card-body">
            <div class="col-md-12">
            	<table class="table" id="tbls">
            		<thead>
            			<tr>
	            			<th>
	            				Modul
	            			</th>
	            			<th class="text-center">
	            				Level
	            			</th>
	            			<th class="text-center">
	            				Akses I/O
	            			</th>
	            			<th class="text-center">
	            				Aksi
	            			</th>
	            		</tr>
            		</thead>
            		<tbody id="appendFeed">
            			
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var jsonRole = dataJsonRole();
		console.log(jsonRole);
		var html = '';
		jsonRole.forEach(function(index, el) {
			
			html += '<tr id="'+index.id_role+'">'+
					'<td wi dth="200">'+
					'<span>'+index.module+'</span>'+
					'</td>'+
					'<td width="200" class="text-center">'+
					'<span>'+index.id_level+'</span>'+
					'</td>'+
					'<td>'+
					'<div class="switch-field mx-auto">'+
					'<input type="radio" id="akses-one'+index.id_role+'" name="akses-one'+index.id_role+'" idrole='+index.id_role+'value="1" '; if(index.akses == "1"){html += 'checked';} html += '/>'+
					'<label for="akses-one'+index.id_role+'" class="ml-auto" field="akses" onclick="updateRole(this.id)" id="'+index.id_role+'_akses_'+index.akses+'">I</label>'+
					'<input type="radio" id="akses-two'+index.id_role+'" name="akses-one'+index.id_role+'" idrole='+index.id_role+' value="0" '; if(index.akses == "0"){html += 'checked';} html += '/>'+
					'<label for="akses-two'+index.id_role+'" class="mr-auto" field="akses" onclick="updateRole(this.id)" id="'+index.id_role+'_akses_'+index.akses+'">O</label>'+
					'</div>'+
					'</td>'+
					'<td>'+
					'<center>'+
					'<button type="button" class="btn btn-danger btn-xs" id="del'+index.id_role+'" idrole="'+index.id_role+'"><i class="fas fa-trash-alt"></i></button> '+
					'</center>'+
					'</td>'+
					'</tr>';

					$("#tbls").on("click", "#del"+index.id_role, function() {
					   $(this).closest("tr").remove();
					   $.post("<?=base_url()?>admin/ajax/deleteRoles", {id: index.id_role}, function(data, textStatus, xhr) {
					   	console.log(data);
					   });
					});


			

		});
		$("#appendFeed").html(html);
	});

	function updateRole(id)
	{
		var data 		= $("#"+id).attr('id').split('_');
		var id 			= data[0];
		var field 		= data[1];
		var n 			= data[2];
		$.ajax({
			url: "<?=base_url()?>admin/ajax/updateRoles",
			type: 'POST',
			dataType: 'json',
			data: {id:id,field:field,n:n},
		})
		.done(function() {
			console.log("update success");
		})
		.fail(function() {
			console.log("update error");
		});
		
	}

	function dataJsonRole()
    {
        var ret_val = {};
        $.ajax({
            url: '<?=base_url()?>admin/ajax/getRoles',
            type: 'GET',
            data: {par:'val'},
            async: false,
            dataType: 'json'
        }).done(function (response) {
            ret_val = response;
        }).fail(function (jqXHR, textStatus, errorThrown) {
            ret_val = null;
        });
        return ret_val;
    }

	function sendData()
	{
		var data = $('.roleMenu').serialize();
		console.log(data);
		$.ajax({
			url: "<?=base_url().'admin/ajax/roleSave'?>",
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(dt) {

			if(dt.feed==1){
				window.location.reload();
			}else{
				console.log('gagal')
			}
		})
		.fail(function() {
			console.log("error");
		});
		
	}
</script>


