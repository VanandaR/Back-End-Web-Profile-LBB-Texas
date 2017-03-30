<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_staff extends RAST_Model {

    function get_list() {
        $query = $this->db->query
        ('
                    SELECT
                        *
                    FROM
                        staff
		');

        return $query->result_array();
    }

    function get_isi($a) {
        $query = $this->db->query
        ('
					SELECT
						*
					FROM
						staff
					WHERE
						id_staff = ' . $a
        );

        return $query->result_array();
    }


    function process($a) {
        $query = FALSE;

        if ($a['id'] == '') {



            $query = $this->db->query
            ('
						INSERT INTO staff VALUES
						(
							' . "'" . "'" . '
							, ' . "'" . ((isset($a['gambarstaff'])) ? $a['gambarstaff'] : ' --') . "'" . '
							, ' . "'" . $a['nama_staff'] . "'" . '
							, ' . "'" . $a['jabatan'] . "'" . '
							, ' . "'" . $a['url_facebook'] . "'" . '
							, ' . "'" . $a['url_twitter'] . "'" . '
							, ' . "'" . $a['url_google'] . "'" . '
							, 1
						)
					');
//                             , ' . "'" . $a['foto'] . "'" . '
        } else {
            if(isset($a['gambarstaff'])) {
                $query = $this->db->query
                ('
						UPDATE staff SET gambar_staff = ' . "'" . $a['gambarstaff'] . "'" . '
						WHERE
							id_staff = ' . $a['id']
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
                    UPDATE staff SET
                        status = 2
                    WHERE
                        id_staff = ' . $a
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
                    UPDATE staff SET
                        status = 1
                    WHERE
                        id_staff = ' . $a
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
                    UPDATE staff SET
                        status = 0
                    WHERE
                        id_staff = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
