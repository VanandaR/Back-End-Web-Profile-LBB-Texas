<script src="<?= base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url(); ?>assets/js/toggles.min.js"></script>
<script src="<?= base_url(); ?>assets/js/retina.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.cookies.js"></script>

<script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>

<!---->
<script src="<?= base_url(); ?>assets/js/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<!---->

<script src="<?= base_url(); ?>assets/js/custom.js"></script>

<script>
    jQuery(document).ready(function() {
        // Chosen Select
        jQuery(".chosen-select").chosen({'width': '100%', 'white-space': 'nowrap'});

        // Basic Form
        jQuery("#basicForm").validate({
            highlight: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-error');
            }
        });

        var id_barang = 0, total = 0, edit = new Array(), barang = new Array(new Array()), simpan = new Array(new Array(null));
        $("#id_barang").change(function() {
            edit = null; var data = $(this).val().split(";");
            $("#id_produk").val(data[0]);
            $("#nama_produk").val(data[1]);
            $("#harga_produk").val(data[2]);
            $("#stok").val(data[3]);
        });

        $("#id_barang_beli").change(function() {
            edit = null; var data = $(this).val().split(";");
            $("#id_produk").val(data[0]);
            $("#nama_produk").val(data[1]);
            $("#harga_produk").val(data[2]);
        });

        $("#save").click(function() {
            if ($("#id_produk").val() === "") {
                alert("Pilih Produk!");
            } else if ($("#jumlah_produk").val() === "") {
                alert("Jumlah Produk Tidak Boleh Kosong!");
            } else if ($("#harga_produk").val() === "") {
                alert("Harga Produk Tidak Boleh Kosong!");
            } else if (isNaN($("#jumlah_produk").val())) {
                alert("Jumlah Produk Harus Angka!");
            } else if (isNaN($("#harga_produk").val())) {
                alert("Harga Produk Harus Angka!");
            } else if (parseInt($("#stok").val()) < parseInt($("#jumlah_produk").val())) {
                $("#jumlah_produk").val("");
                alert("Barang tidak cukup!\nStok barang hanya tinggal " + $("#stok").val() + "!");
            } else {
                var sama = 0, i = 0;
                do {
                    if (barang[i][0] === $("#id_produk").val() && barang[i][4] === 1 && edit !== null) {
                        sama = 1;
                    } else if (barang[i][0] === $("#id_produk").val() && barang[i][4] === 1) {
                        sama = -1;
                    }
                    i++;
                } while (sama === 0 && i < barang.length)

                if (sama === 0) {
                    tambahData();
                    reset();
                } else if (sama === 1) {
                    editBarang();
                    reset();
                } else {
                    alert("Barang telah dimasukkan dalam List!");
                    reset();
                }
            }
        });

        $("#reset").live("click", function() {
            reset();
        });

        $(".edi").live("click", function() {
            var data = $(this).attr("id").split(";");
            $("#id_barang option[value='" + data[1] + ";" + data[2] + ";" + data[3] + "']").attr("selected", true); // set select by value
            $('#id_barang').trigger("chosen:updated"); // refresh list combobox
            $("#id_barang_beli option[value='" + data[1] + ";" + data[2] + ";" + data[3] + "']").attr("selected", true); // set select by value
            $('#id_barang_beli').trigger("chosen:updated"); // refresh list combobox

            $("#id_produk").val(data[1]);
            $("#harga_produk").val(data[3]);
            $("#jumlah_produk").val(data[4]);
            edit = data;
        });

        $(".del").live("click", function() {
            var data = $(this).attr("id").split(";");
            barang[data[2]][3] = 0; // jumlah
            barang[data[2]][4] = 0; // status
            loadBarang();
        });

        $("#bayarBeli").live("click", function() {
            var babay = false, hargaTotal = addThousandsSeparator(total - parseInt($("#diskon").val()));
            
            $("#isiPrintTable").append(
                    "<tr>" +
                    "   <td colspan=\"2\"></td>" +
                    "   <td colspan=\"1\" class=\"pull-right\" >Diskon : </td>" +
                    "   <td style=\"text-align:right\">" + addThousandsSeparator($("#diskon").val()) + "</td>" +
                    "</tr>" +
                    "<tr>" +
                    "   <td colspan=\"2\"></td>" +
                    "   <td colspan=\"1\" class=\"pull-right\" >Total : </td>" +
                    "   <td style=\"text-align:right\">" + hargaTotal + "</td>" +
                    "</tr>");
            
            if (babay === false) {
                w = window.open();
                w.document.write("<link href=\"<?= base_url(); ?>assets\/css\/style.default.css\" rel=\"stylesheet\" \/>");
                w.document.write($('#printTable').html());
                w.document.write("<script type=\"text\/javascript\" src=\"<?= base_url(); ?>assets\/js\/jquery-1.10.2.min.js\"><\/script>");
                w.document.write("<script type=\"text\/javascript\">\njQuery(document).ready(function() {\n\t$(\".gaUsahDiPrint\").addClass(\"hidden\");\n});\n<\/script>");
                w.print();
                w.close();
                babay = true;
            }
            if (bayar() && babay) {
                $("#formListBarang").submit();
            }
        });

        $("#bayarJual").live("click", function() {
            var babay = false, simpanBayar = false, totalPembayaran = total - parseInt($("#diskon").val()), hargaTotal = addThousandsSeparator(total - parseInt($("#diskon").val()));
            
            if (bayar()) {
                do {
                    var number = parseInt(prompt("Total pembayaran " + hargaTotal, ""));
                    if (number < totalPembayaran) {
                        alert("Uang yang diinput kurang");
                    } else if (isNaN(number)) {
                        alert("Anda harus menginputkan nominal");
                    } else {
                        alert("Kembali : Rp. " + addThousandsSeparator(number - totalPembayaran));

                        $("#isiPrintTable").append(
                                "<tr>" +
                                "   <td colspan=\"2\"></td>" +
                                "   <td colspan=\"1\" class=\"pull-right\" >Diskon : </td>" +
                                "   <td style=\"text-align:right\">" + addThousandsSeparator($("#diskon").val()) + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "   <td colspan=\"2\"></td>" +
                                "   <td colspan=\"1\" class=\"pull-right\" >Total : </td>" +
                                "   <td style=\"text-align:right\">" + hargaTotal + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "   <td colspan=\"2\"></td>" +
                                "   <td colspan=\"1\" class=\"pull-right\" >Tunai : </td>" +
                                "   <td style=\"text-align:right\">" + addThousandsSeparator(number) + "</td>" +
                                "</tr>" +
                                "<tr>" +
                                "   <td colspan=\"2\"></td>" +
                                "   <td colspan=\"1\" class=\"pull-right\" >Kembali : </td>" +
                                "   <td style=\"text-align:right\">" + addThousandsSeparator(number - totalPembayaran) + "</td>" +
                                "</tr>");
                        simpanBayar = true;
                    }
                } while ((number < totalPembayaran) || isNaN(number));

                if (babay === false) {
                    w = window.open();
                    w.document.write("<link href=\"<?= base_url(); ?>assets\/css\/style.default.css\" rel=\"stylesheet\" \/>");
                    w.document.write($('#printTable').html());
                    w.document.write("<script type=\"text\/javascript\" src=\"<?= base_url(); ?>assets\/js\/jquery-1.10.2.min.js\"><\/script>");
                    w.document.write("<script type=\"text\/javascript\">\njQuery(document).ready(function() {\n\t$(\".gaUsahDiPrint\").addClass(\"hidden\");\n});\n<\/script>");
                    w.print();
                    w.close();
                    babay = true;
                }

                if (simpanBayar && babay) {
                    $("#formListBarang").submit();
                }
            }
        });

        function tambahData() {
            barang[barang.length] = [$("#id_produk").val(), $("#nama_produk").val(), $("#harga_produk").val(), $("#jumlah_produk").val(), 1];
            loadBarang();
        }

        function reset() {
            $('#id_barang').val(0); // set value ke-0
            $('#id_barang').trigger("chosen:updated"); // refresh list combobox
            $('#id_barang_beli').val(0); // set value ke-0
            $('#id_barang_beli').trigger("chosen:updated"); // refresh list combobox
            $("#id_produk").val("");
            $("#nama_produk").val("");
            $("#harga_produk").val("");
            $("#jumlah_produk").val("");
            edit = null;
        }

        function editBarang() {
            barang[edit[0]] = [edit[1], edit[2], edit[3], $("#jumlah_produk").val(), 1];
            edit = null;
            loadBarang();
        }

        function addThousandsSeparator(input) {
            var output = input
            if (parseFloat(input)) {
                input = new String(input); // so you can perform string operations
                var parts = input.split("."); // remove the decimal part
//                parts[0] = parts[0].split("").reverse().join("").replace(/(\d{3})(?!$)/g, "$1,").split("").reverse().join(""); // 3,000,000
                parts[0] = parts[0].split("").reverse().join("").replace(/(\d{3})(?!$)/g, "$1.").split("").reverse().join(""); // 3.000.000
                output = parts.join(".");
            }

            return output;
        }

        function loadBarang() {
            total = 0; id_barang = 0; var hargaTotal = 0;
            $("#cartTable").html(""); $("#isiPrintTable").html("");

            for (i = 0; i < barang.length; i++) {
                if (barang[i][4] === 1) {
                    var subtotal = barang[i][2] * barang[i][3], hargaBarang = addThousandsSeparator(barang[i][2]), jumlahBarang = addThousandsSeparator(barang[i][3]), hargaSubtotal = addThousandsSeparator(subtotal);

                    $("#cartTable").append(
                            "<tr id='orderitem" + id_barang + "'>" +
                            "   <td style=\"text-align:center\"><input type='hidden' name='id_produk[]' value='" + barang[i][0] + "'>" + (id_barang + 1) + "</td>" +
                            "   <td>" + barang[i][1] + "</td>" +
                            "   <td style=\"text-align:right\"><input type='hidden' name='jumlah[]' value='" + barang[i][3] + "'>" + jumlahBarang + "</td>" +
                            "   <td style=\"text-align:center\"><input type='hidden' name='harga[]' value='" + barang[i][2] + "'>" + hargaBarang + "</td>" +
                            "   <td style=\"text-align:right\">" + hargaSubtotal + "</td>" +
                            "   <td style=\"text-align:center\" class=\"gaUsahDiPrint\">" +
                            "       <a href='javascript:;' id='" + i + ";" + barang[i][0] + ";" + barang[i][1] + ";" + barang[i][2] + ";" + barang[i][3] + "' class='edi btn mini red'>" +
                            "           <i class=\"fa fa-pencil\"></i>" +
                            "       </a>" +
                            "       <a href='javascript:;' id='" + id_barang + ";" + subtotal + ";" + i + "' class='del btn mini red'>" +
                            "           <i class=\"fa fa-trash-o\"></i>" +
                            "       </a>" +
                            "   </td>" +
                            "</tr>");
                    
                    $("#isiPrintTable").append(
                            "<tr id='orderitem" + id_barang + "'>" +
                            "   <td>" + barang[i][1] + "</td>" +
                            "   <td style=\"text-align:right\">" + jumlahBarang + "</td>" +
                            "   <td style=\"text-align:center\">" + hargaBarang + "</td>" +
                            "   <td style=\"text-align:right\">" + hargaSubtotal + "</td>" +
                            "</tr>");

                    total += subtotal; id_barang++;
                }
                hargaTotal = addThousandsSeparator(total - parseInt($("#diskon").val()));
                $("#total").html("Total : " + hargaTotal);
            }
        }

        function bayar() {
            var urutSimpan = 0;
            for (i = 0; i < barang.length; i++) {
                if (barang[i][4] === 1) {
                    simpan[urutSimpan] = [barang[i][0], barang[i][3]]; // (id_produk / id_barang) && (jumlah_produk / jumlah_barang)
                    urutSimpan++;
                }
            }

            if (simpan[0][0] === null) {
                alert("Anda belum membeli apapun");
                return false;
            } else {
                return true;
            }
        }
    });
</script>	