<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends RAST_Model {

    function login($u, $p) {
        $query = $this->db->query
                ('SELECT
					    *
					FROM
						users
					WHERE
						username = "' . $u . '" 
						AND password = "' . md5($p) . '" 
						AND status = 1
		        ');

        
        if ($query->num_rows() == 1 && $query->row()->level > 0) {
            $this->session->set_userdata('user_id', $query->row()->id);
            $this->session->set_userdata('user_name', $query->row()->name);
            $this->session->set_userdata('level', $query->row()->level);

            $this->session->set_userdata('visits_form', FALSE);
            $this->session->set_userdata('report_visits', FALSE);
            $this->session->set_userdata('report_sales', FALSE);
            $this->session->set_userdata('report_restock', FALSE);

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getUser() {
        if ($this->session->userdata('user_id') != FALSE && $this->session->userdata('level') > 0) {
            return $this->session->userdata('level');
        } else {
            return NULL;
        }
    }
}
