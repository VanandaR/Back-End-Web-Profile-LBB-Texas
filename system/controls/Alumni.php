<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class alumni extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') != 1) {
            redirect('dashboard');
        }

        $this->load->model('M_alumni');
    }

    function index() {

        $isi = array(
            'descript' => 'Slide yang ditampilkan'
        , 'dataTable' => $this->M_alumni->get_list()
        , 'add_button' => true
        , 'back_button' => false
        );

        $this->set_page('alumni', $isi['descript'], 'alumni', $isi);
    }

    function form() {
        $this->output->set_content_type('application/json');

        $id = $_POST['id'];
        echo json_encode($this->M_alumni->get_isi($id));
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambaralumni']['name'];
        $file_loc = $_FILES['gambaralumni']['tmp_name'];
        $file_size = $_FILES['gambaralumni']['size'];
        $file_type = $_FILES['gambaralumni']['type'];
        $folder="assets/images/gambaralumni/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambaralumni" => $file));

            if ($this->M_alumni->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' alumni, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' alumni, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_alumni->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' alumni, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' alumni, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('alumni');
    }
    function nonaktifkan($a)
    {
        if ($this->M_alumni->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! alumni telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('alumni');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! alumni tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('alumni');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_alumni->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! alumni telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('alumni');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! alumni tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('alumni');
        }
    }
    function delete($a) {
        if ($this->M_alumni->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! alumni telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('alumni');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! alumni tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('alumni');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
