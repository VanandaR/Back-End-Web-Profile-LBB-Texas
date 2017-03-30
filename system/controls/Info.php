<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class info extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_info');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_info->get_list()
        , 'add_button' => true
        , 'back_button' => false
        );

        $this->set_page('info', $isi['descript'], 'info', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_info->get_isi($id));
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambarinfo']['name'];
        $file_loc = $_FILES['gambarinfo']['tmp_name'];
        $file_size = $_FILES['gambarinfo']['size'];
        $file_type = $_FILES['gambarinfo']['type'];
        $folder="assets/images/gambarinfo/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambarinfo" => $file));

            if ($this->M_info->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' info, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' info, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_info->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' info, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' info, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('info');
    }
    function nonaktifkan($a)
    {
        if ($this->M_info->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! info telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('info');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! info tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('info');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_info->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! info telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('info');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! info tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('info');
        }
    }
    function delete($a) {
        if ($this->M_info->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! info telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('info');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! info tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('info');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
