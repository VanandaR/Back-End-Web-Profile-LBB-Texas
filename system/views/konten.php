<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Background</th>
                    <th>Gambar Konten</th>

                    <th>Tulisan konten</th>
                    <th>Kategori</th>
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
                        <td><img src="<?= base_url(); ?>assets/images/gambarbackground/<?= $t['gambar_background']; ?>" width="100px"></td>
                        <td><img src="<?= base_url(); ?>assets/images/gambarkonten/<?= $t['gambar_konten']; ?>" width="100px"></td>
                        <td><?= $t['tulisan_konten']; ?></td>
                        <td><?= $t['kategori']; ?></td>
                        <td><?php echo (($t['status']==1))?"Aktif":"Tidak Aktif"; ?></td>
                        <td>
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" class="edit" id="<?= $t['id_konten']; ?>"><i class="fa fa-pencil"></i> Ubah</a> |
                            <?php if($t['status']==1){?>
                                <a href="<?= base_url(); ?>konten/nonaktifkan/<?= $t['id_konten']; ?>" onclick="return confirm('Apakah anda yakin menonaktifkan data ini?');"><i class="fa fa-ban"></i> Non Aktifkan</a> |
                            <?php }else{?>
                                <a href="<?= base_url(); ?>konten/aktifkan/<?= $t['id_konten']; ?>"><i class="fa fa-check"></i> Aktifkan</a> |
                            <?php }?>
                            <a href="<?= base_url(); ?>konten/delete/<?= $t['id_konten']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penting ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
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
                    <form id="basicForm" method="POST" action="<?= base_url(); ?>konten/process" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar background <span class="asterisk">*</span>(Maksimal Ukuran Gambar : 2 MB)</label>
                            <div class="col-sm-6">
                                <img id="preview_background" src="<?= base_url(); ?>assets/images/nopreview.jpg" width="275px"  />
                                <br>
                                <br>
                                <input type='file' id="imgBackground" name="gambarbackground"/>

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gambar konten <span class="asterisk">*</span>(Maksimal Ukuran Gambar : 2 MB)</label>
                            <div class="col-sm-6">
                                <img id="preview_konten" src="<?= base_url(); ?>assets/images/nopreview.jpg" width="275px"  />
                                <br>
                                <br>
                                <input type='file' id="imgKonten" name="gambarkonten"/>

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tulisan Konten <span class="asterisk">*</span></label>
                            <div class="col-sm-6">
                                <textarea  id="konten" name="konten" rows="10"></textarea>
                                <script>
                                    CKEDITOR.replace('konten');
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kategori <span class="asterisk">*</span></label>
                            <div class="col-sm-6">

                                    <select class="form-control" id="kategori" name="kategori">
                                        <option value="0">--Pilih Kategori--</option>
                                        <?php
                                        foreach ($kategori as $kateg):
                                        ?>
                                            <option value="<?= $kateg['id_kategori'];?>"><?php echo $kateg['nama_kategori'];?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>


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
    function previewKonten(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_konten').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function previewBackground(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_background').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgBackground").change(function(){
        previewBackground(this);
    });
    $("#imgKonten").change(function(){
        previewKonten(this);
    });

    $('#tambah').click(function() {
        $("#password_group").show();
        $("#save").show();
        main_form_disable(false);

        $("input[name='id_konten']")	.val("");

        $("input[name='nama_']")	.val("")
            .attr('required', true);

    });

    $('.edit').click(function() {
        jQuery.ajax({
            type: "POST",
            url: "<?= base_url(); ?>konten/form",
            dataType: 'JSON',
            data: {id: $(this).attr("id")},
            success: function(data) {
                $("#password_group").show();
                $("#save").show();

                $("input[name='id']")	.val(data[0]['id_konten']);
                $('#preview_background').attr('src', '<?= base_url(); ?>assets/images/gambarbackground/'+data[0]['gambar_background']);
                $('#preview_konten').attr('src', '<?= base_url(); ?>assets/images/gambarkonten/'+data[0]['gambar_konten']);
                $("#konten").val(data[0]['tulisan_konten'])
                    .attr('required', true);
                document.getElementById("kategori").selectedIndex=data[0]['kategori'];


            }
        });
    });


    $('#save').click(function() {
        $('#basicForm').submit();
    });

</script>
