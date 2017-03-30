<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telpon</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($dataTable as $t):
                    	$tgl = explode('-', $t['date_of_birth']);
                    	$jabatan = "";
                    	if ($t['level'] == 1) {
                    		$jabatan = "Admin";
                    	}
                        ?>
                        <tr class="gradeA">
                            <td><?= ++$i; ?></td>
                            <td><?= $t['name']; ?></td>
                            <td><?= $t['username']; ?></td>
                            <td><?= $t['phone']; ?></td>
                            <td><?= $t['place_of_birth'] . ', ' . ($tgl[2] . '-' . $tgl[1] . '-' . $tgl[0]); ?></td>
                            <td><?= $t['gender']; ?></td>
                            <td><?= $jabatan; ?></td>
                            <td>
                                <a href="#myModal" data-toggle="modal" data-target="#myModal" class="detail" id="<?= $t['id']; ?>"><i class="fa fa-search-plus"></i> Detail</a> |
                                <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                                <a href="<?= base_url(); ?>user/delete/<?= $t['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penting ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div><!-- table-responsive -->
    </div><!-- panel-body -->
</div><!-- panel -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
            	<div id="modal_content">
					<form id="basicForm" method="POST" action="<?= base_url(); ?>user/process" class="form-horizontal">
						<input type="hidden" name="id" value="" />
						<div class="form-group">
							<label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="username" class="form-control" placeholder="Username" value="" />
							</div>
						</div>
						<div class="form-group" id="password_group">
							<label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="password" name="password" class="form-control" placeholder="Password" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nomor KTP <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="id_card" class="form-control" placeholder="Nomor KTP" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="name" class="form-control" placeholder="Nama" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Telpon <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="phone" class="form-control" placeholder="Telpon" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Alamat <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="address" class="form-control" placeholder="Alamat" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tempat Lahir <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="place_of_birth" class="form-control" placeholder="Tempat Lahir" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Lahir <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="date_of_birth" class="form-control" id="datepicker" placeholder="Tanggal Lahir" value="" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kewarganegaraan <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<div class="radio"><label><input name="nationality" type="radio" value="WNI" checked /> WNI</label></div>
								<div class="radio"><label><input name="nationality" type="radio" value="WNA" /> WNA</label></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<div class="radio"><label><input name="gender" type="radio" value="L" checked /> Laki-laki</label></div>
								<div class="radio"><label><input name="gender" type="radio" value="P" /> Perempuan</label></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jabatan <span class="asterisk">*</span></label>
							<div class="col-sm-6">
								<select id="level" class="form-control chosen-select" name="level" required>
									<option value="">Choose One</option>
									<option value="1">Admin</option>
								</select>
							</div>
						</div><!-- form-group -->
					</form>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modal" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="save" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
	$('#tambah').click(function() {
		$("#password_group").show();
		$("#save").show();
		main_form_disable(false);
		
		$("input[name='id']")	.val("");

		$("input[name='username']")	.val("")
									.attr('required', true);

		$("input[name='password']")	.val("")
									.attr('required', true)
									.attr('placeholder','Password');

		$("input[name='id_card']")	.val("")
									.attr('required', true);

		$("input[name='name']")	.val("")
								.attr('required', true);

		$("input[name='phone']")	.val("")
									.attr('required', true);

		$("input[name='address']")	.val("")
									.attr('required', true);

		$("input[name='place_of_birth']")	.val("")
											.attr('required', true);

		$("input[name='date_of_birth']")	.val("")
											.attr('required', true);
		
		$("input[name='nationality'][value='WNI']").attr('checked', true);

		$("input[name='gender'][value='L']").attr('checked', true);
		
		$("#level")	.val("")
					.attr('required', true)
					.trigger("chosen:updated");
	});

	$('.edit').click(function() {
		jQuery.ajax({
			type: "POST",
			url: "<?= base_url(); ?>user/form",
			dataType: 'JSON',
			data: {id: $(this).attr("id")},
			success: function(data) {
				$("#password_group").show();
				$("#save").show();
				main_form_disable(false);
		
				$("input[name='id']")	.val(data[0]['id']);

				$("input[name='username']")	.val(data[0]['username'])
											.attr('required', true);

				$("input[name='password']")	.attr('required', false)
											.attr('placeholder','Kosongi jika tidak ingin mengganti password');

				$("input[name='id_card']")	.val(data[0]['id_card'])
											.attr('required', true);

				$("input[name='name']")	.val(data[0]['name'])
										.attr('required', true);

				$("input[name='phone']")	.val(data[0]['phone'])
											.attr('required', true);

				$("input[name='address']")	.val(data[0]['address'])
											.attr('required', true);

				$("input[name='place_of_birth']")	.val(data[0]['place_of_birth'])
													.attr('required', true);

				tgl = data[0]['date_of_birth'].split('-');
				$("input[name='date_of_birth']").datepicker();
				$("input[name='date_of_birth']").datepicker('setDate', (tgl[1] + '/' + tgl[2] + '/' + tgl[0]));

				$("input[name='nationality'][value='" + data[0]['nationality'] + "']").attr('checked', true);

				$("input[name='gender'][value='" + data[0]['gender'] + "']").attr('checked', true);

				$("#level")	.val(data[0]['level'])
							.attr('required', true)
							.trigger("chosen:updated");
			}
		});
	});

	$('.detail').click(function() {
		jQuery.ajax({
			type: "POST",
			url: "<?= base_url(); ?>user/form",
			dataType: 'JSON',
			data: {id: $(this).attr("id")},
			success: function(data) {
				$("#password_group").hide();
				$("#save").hide();
				main_form_disable(true);

				$("input[name='id']")	.val(data[0]['id'])
										.attr('required', false);

				$("input[name='username']")	.val(data[0]['username'])
											.attr('required', true);

				$("input[name='id_card']")	.val(data[0]['id_card'])
											.attr('required', true);

				$("input[name='name']")	.val(data[0]['name'])
										.attr('required', true);

				$("input[name='phone']")	.val(data[0]['phone'])
											.attr('required', true);

				$("input[name='address']")	.val(data[0]['address'])
											.attr('required', true);

				$("input[name='place_of_birth']")	.val(data[0]['place_of_birth'])
													.attr('required', true);

				tgl = data[0]['date_of_birth'].split('-');
				$("input[name='date_of_birth']").datepicker();
				$("input[name='date_of_birth']").datepicker('setDate', (tgl[1] + '/' + tgl[2] + '/' + tgl[0]));

				$("input[name='nationality'][value='" + data[0]['nationality'] + "']").attr('checked', true);

				$("input[name='gender'][value='" + data[0]['gender'] + "']").attr('checked', true);

				$("#level")	.val(data[0]['level'])
							.attr('required', true)
							.trigger("chosen:updated");
			}
		});
	});

	$('#save').click(function() {
		$('#basicForm').submit();
	});
	
	function main_form_disable(a) {
		$("input[name='id']").attr('disabled', a);
		$("input[name='username']").attr('disabled', a);
		$("input[name='password']").attr('disabled', a);
		$("input[name='id_card']").attr('disabled', a);
		$("input[name='name']").attr('disabled', a);
		$("input[name='phone']").attr('disabled', a);
		$("input[name='address']").attr('disabled', a);
		$("input[name='place_of_birth']").attr('disabled', a);
		$("input[name='date_of_birth']").attr('disabled', a);
		$("input[name='nationality']").attr('disabled', a);
		$("input[name='gender']").attr('disabled', a);
		$("#level").attr('disabled', a);
	}
</script>
