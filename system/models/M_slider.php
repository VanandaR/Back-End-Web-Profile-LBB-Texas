<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_slider extends RAST_Model {

    function get_list() {
        $query = $this->db->query
        ('
                    SELECT
                        *
                    FROM
                        slider
                    WHERE
                        status = 1 OR status=2
		');

        return $query->result_array();
    }

    function get_isi($a) {
        $query = $this->db->query
        ('
					SELECT
						*
					FROM
						slider
					WHERE
						id_slider = ' . $a
        );

        return $query->result_array();
    }


    function process($a) {
        $query = FALSE;

        if ($a['id'] == '') {



            $query = $this->db->query
            ('
						INSERT INTO slider VALUES
						(
							' . "'" . "'" . '
							, ' . "'" . ((isset($a['gambarslider'])) ? $a['gambarslider'] : ' --') . "'" . '
							, 1
						)
					');
//                             , ' . "'" . $a['foto'] . "'" . '
        } else {
            if(isset($a['gambarslider'])) {
                $query = $this->db->query
                ('
						UPDATE galeri SET gambar_galeri = ' . "'" . $a['gambarslider'] . "'" . '
						WHERE
							id_galeri = ' . $a['id']
                );
            }
//                             , foto = ' . "'" . $a['foto'] . "'" . '
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function nonaktifkan($a) {
        $query = $this->db->query
        ('
                    UPDATE slider SET
                        status = 2
                    WHERE
                        id_slider = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function aktifkan($a) {
        $query = $this->db->query
        ('
                    UPDATE slider SET
                        status = 1
                    WHERE
                        id_slider = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function delete($a) {
        $query = $this->db->query
        ('
                    UPDATE slider SET
                        status = 0
                    WHERE
                        id_slider = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
