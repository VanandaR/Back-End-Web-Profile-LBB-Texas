<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Info</th>
                    <th>Info</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($dataTable as $t):

                    ?>
                    <tr class="gradeA">
                        <td><?= ++$i; ?></td>
                        <td><img src="<?= base_url(); ?>assets/images/gambarinfo/<?= $t['gambar_info']; ?>" width="100px"></td>
                        <td><?php echo $t['tulisan_info'] ?></td>
                        <td><?php echo $t['tanggal_info'] ?></td>
                        <td><?php echo (($t['status']==1))?"Aktif":"Tidak Aktif"; ?></td>
                        <td>
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id_info']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                            <?php if($t['status']==1){?>
                                <a href="<?= base_url(); ?>info/nonaktifkan/<?= $t['id_info']; ?>" onclick="return confirm('Apakah anda yakin menonaktifkan data ini?');"><i class="fa fa-ban"></i> Non Aktifkan</a> |
                            <?php }else{?>
                                <a href="<?= base_url(); ?>info/aktifkan/<?= $t['id_info']; ?>"><i class="fa fa-check"></i> Aktifkan</a> |
                            <?php }?>
                            <a href="<?= base_url(); ?>info/delete/<?= $t['id_info']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penting ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
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
                    <form id="basicForm" method="POST" action="<?= base_url(); ?>info/process" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar info <span class="asterisk">*</span></label>
                            <div class="col-sm-6">
                                <img id="preview_gambar" src="<?= base_url(); ?>assets/images/nopreview.jpg" width="100%"  />
                                <br>
                                <br>
                                <input type='file' id="imgInp" name="gambarinfo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Info <span class="asterisk">*</span></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="info" name="info" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal <span class="asterisk">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="tanggalinfo" class="form-control" id="datepicker" placeholder="Tanggal Info" value="" />
                            </div>
                        </div>
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
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_gambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $('#tambah').click(function() {
        $("#password_group").show();
        $("#save").show();
        main_form_disable(false);

        $("input[name='id_info']")	.val("");


        $("input[name='nama_info']")	.val("")
            .attr('required', true);
    });

    $('.edit').click(function() {
        jQuery.ajax({
            type: "POST",
            url: "<?= base_url(); ?>info/form",
            dataType: 'JSON',
            data: {id: $(this).attr("id")},
            success: function(data) {
                $("#password_group").show();
                $("#save").show();

                $("input[name='id']")	.val(data[0]['id_info']);

                $('#preview_gambar').attr('src', '<?= base_url(); ?>assets/images/gambarinfo/'+data[0]['gambar_info']);
                $("#info").val(data[0]['tulisan_info'])
                    .attr('required', true);
            }
        });
    });


    $('#save').click(function() {
        $('#basicForm').submit();
    });

</script>
