<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_alumni extends RAST_Model {

    function get_list() {
        $query = $this->db->query
        ('
                    SELECT
                        *
                    FROM
                        info
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
						info
					WHERE
						id_info = ' . $a
        );

        return $query->result_array();
    }


    function process($a) {
        $query = FALSE;
        $tgl = explode('/', $a['tanggalinfo']);
        if ($a['id'] == '') {



            $query = $this->db->query
            ('
						INSERT INTO info VALUES
						(
							' . "'" . "'" . '
							, ' . "'" . ((isset($a['gambarinfo'])) ? $a['gambarinfo'] : ' --') . "'" . '
							, ' . "'" . $a['info'] . "'" . '
							, ' . "'" . $tgl[2] . '-' . $tgl[0] . '-' . $tgl[1] . "'" . '
							, 1
						)
					');
//                             , ' . "'" . $a['foto'] . "'" . '
        } else {
            if(isset($a['gambarinfo'])) {
                $query = $this->db->query
                ('
						UPDATE info SET gambar_info = ' . "'" . $a['gambarinfo'] . "'" . '
						, tulisan_info = ' . "'" . $a['info'] . "'" . '
						, tanggal_info=' . "'" . $tgl[2] . '-' . $tgl[0] . '-' . $tgl[1] . "'" . '
						WHERE
							id_info = ' . $a['id']
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
                    UPDATE info SET
                        status = 2
                    WHERE
                        id_info = ' . $a
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
                    UPDATE info SET
                        status = 1
                    WHERE
                        id_info = ' . $a
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
                    UPDATE info SET
                        status = 0
                    WHERE
                        id_info = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
