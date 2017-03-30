<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class API extends RAST_Control {

    private $data;

    function __construct() {
        parent::__construct();

        $this->load->model('M_slider');
    }

    function get_slider() {
        $this->output->set_content_type('application/json');

       echo json_encode($this->M_slider->get_list());
    }


    function process() {
        if ($this->session->userdata('level') < 1) {
            redirect('dashboard');
        }

        $post1 = $_POST;

        $file = rand(1000,100000)."_".$_FILES['gambarslider']['name'];
        $file_loc = $_FILES['gambarslider']['tmp_name'];
        $file_size = $_FILES['gambarslider']['size'];
        $file_type = $_FILES['gambarslider']['type'];
        $folder="assets/images/gambarslider/";

        if (move_uploaded_file($file_loc,$folder.$file)) {
            $post = array_merge($post1, array("gambarslider" => $file));

            if ($this->M_slider->process($post)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' slider, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' slider, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        } else {
            if ($this->M_slider->process($post1)) {
                $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' slider, SUKSES!');
                $this->session->set_userdata('tipe_pesan', 'Sukses');
            } else {
                $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post1['id'] == '') ? 'Penambahan' : 'Perubahan') . ' slider, GAGAL! Silahkan periksa dan coba kembali');
                $this->session->set_userdata('tipe_pesan', 'Gagal');
            }
        }

        redirect('slider');
    }
    function nonaktifkan($a)
    {
        if ($this->M_slider->nonaktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Slider telah dinonaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('slider');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Slider tidak ternonaktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('slider');
        }
    }
    function aktifkan($a)
    {
        if ($this->M_slider->aktifkan($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Slider telah diaktifkan!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('slider');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Slider tidak teraktifkan! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('slider');
        }
    }
    function delete($a) {
        if ($this->M_slider->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Slider telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('slider');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Slider tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('slider');
        }
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
