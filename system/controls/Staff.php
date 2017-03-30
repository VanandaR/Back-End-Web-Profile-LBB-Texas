<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class staff extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_staff');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_staff->get_list()
        , 'add_button' => true
        , 'back_button' => false
        );

        $this->set_page('staff', $isi['descript'], 'staff', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_staff->get_isi($id));
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambarstaff']['name'];
        $file_loc = $_FILES['gambarstaff']['tmp_name'];
        $file_size = $_FILES['gambarstaff']['size'];
        $file_type = $_FILES['gambarstaff']['type'];
        $folder="assets/images/gambarstaff/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambarstaff" => $file));

            if ($this->M_staff->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' staff, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' staff, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_staff->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' staff, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' staff, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('staff');
    }
    function nonaktifkan($a)
    {
        if ($this->M_staff->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! staff telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('staff');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! staff tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('staff');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_staff->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! staff telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('staff');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! staff tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('staff');
        }
    }
    function delete($a) {
        if ($this->M_staff->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! staff telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('staff');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! staff tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('staff');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
