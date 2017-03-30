<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Slider</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($dataTable as $t):

                    ?>
                    <tr class="gradeA">
                        <td><?= ++$i; ?></td>
                        <td><img src="<?= base_url(); ?>assets/images/gambarslider/<?= $t['gambar_slider']; ?>" width="100px"></td>
                        <td><?php echo (($t['status']==1))?"Aktif":"Tidak Aktif"; ?></td>
                        <td>
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id_slider']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                            <?php if($t['status']==1){?>
                            <a href="<?= base_url(); ?>slider/nonaktifkan/<?= $t['id_slider']; ?>" onclick="return confirm('Apakah anda yakin menonaktifkan data ini?');"><i class="fa fa-ban"></i> Non Aktifkan</a> |
                            <?php }else{?>
                                <a href="<?= base_url(); ?>slider/aktifkan/<?= $t['id_slider']; ?>"><i class="fa fa-check"></i> Aktifkan</a> |
                            <?php }?>
                            <a href="<?= base_url(); ?>slider/delete/<?= $t['id_slider']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penting ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
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
                    <form id="basicForm" method="POST" action="<?= base_url(); ?>slider/process" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar Slider <span class="asterisk">*</span></label>
                            <div class="col-sm-6">
                                <img id="preview_slider" src="<?= base_url(); ?>assets/images/nopreview.jpg" width="275px"  />
                                <br>
                                <br>
                                <input type='file' id="imgInp" name="gambarslider"/>
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
                $('#preview_slider').attr('src', e.target.result);
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

        $("input[name='id_slider']")	.val("");


        $("input[name='nama_slider']")	.val("")
            .attr('required', true);
    });

    $('.edit').click(function() {
        jQuery.ajax({
            type: "POST",
            url: "<?= base_url(); ?>slider/form",
            dataType: 'JSON',
            data: {id: $(this).attr("id")},
            success: function(data) {
                $("#password_group").show();
                $("#save").show();

                $("input[name='id']")	.val(data[0]['id_slider']);

                $('#preview_slider').attr('src', '<?= base_url(); ?>assets/images/gambarslider/'+data[0]['gambar_slider']);


            }
        });
    });


    $('#save').click(function() {
        $('#basicForm').submit();
    });

</script>
