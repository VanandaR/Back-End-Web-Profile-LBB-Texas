<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends RAST_Control {

    private $data = array();

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('level') > 0) {
        } else {
            redirect('login');
        }

        $this->load->model('M_dashboard');
    }

    function index() {

        $isi = array(
			'descript' => "Summary Report"
            , 'add_button' => false
            , 'back_button' => false
		);

		$this->set_page('dashboard', $isi['descript'], 'dashboard', $isi);
    }

    function set_page($menu, $descript, $file, $isi) {
        $data['menu'] = $menu;
        $data['descript'] = $descript;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }
}
