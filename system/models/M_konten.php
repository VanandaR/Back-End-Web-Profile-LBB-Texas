<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_konten extends RAST_Model {

    function get_list() {
        $query = $this->db->query
        ('
                    SELECT
                        *
                    FROM
                        konten
                    ORDER BY
                        kategori
		');

        return $query->result_array();
    }

    function get_isi($a) {
        $query = $this->db->query
        ('
					SELECT
						*
					FROM
						konten
					WHERE
						id_konten = ' . $a
        );

        return $query->result_array();
    }

    function get_kategori(){
        $query = $this->db->query
        ('
					SELECT
						*
					FROM
						kategori'
        );
        return $query->result_array();
    }


    function process($a) {
        $query = FALSE;

        if ($a['id'] == '') {



            $query = $this->db->query
            ('
						INSERT INTO konten VALUES
						(
							' . "'" . "'" . '
							, ' . "'" . ((isset($a['gambarkonten'])) ? $a['gambarkonten'] : ' --') . "'" . '
							, ' . "'" . $a['konten'] . "'" . '
							, ' . "'" . ((isset($a['gambarbackground'])) ? $a['gambarbackground'] : ' --') . "'" . '
							, ' . "'" . $a['kategori'] . "'" . '
							, 1
						)
					');
//                             , ' . "'" . $a['foto'] . "'" . '
        } else {
            if(isset($a['gambarkonten']) && isset($a['gambarbackground'])) {
                $query = $this->db->query
                ('
						UPDATE konten SET gambar_konten = ' . "'" . ((isset($a['gambarkonten'])) ? $a['gambarkonten'] : ' --') . "'" . '
                            , tulisan_konten = ' . "'" . $a['konten'] . "'" . '
						, gambar_background = ' . "'" . ((isset($a['gambarbackground'])) ? $a['gambarbackground'] : ' --') . "'" . '
						, kategori = ' . "'" . $a['kategori'] . "'" . '
						WHERE
							id_konten = ' . $a['id']
                );
            }else if(isset($a['gambarbackground'])) {
                $query = $this->db->query
                ('
						UPDATE konten SET tulisan_konten = ' . "'" . $a['konten'] . "'" . '
						, gambar_background = ' . "'" . ((isset($a['gambarbackground'])) ? $a['gambarbackground'] : ' --') . "'" . '
						, kategori = ' . "'" . $a['kategori'] . "'" . '
						WHERE
							id_konten = ' . $a['id']
                );
            }else if(isset($a['gambarkonten'])) {
                $query = $this->db->query
                ('
						UPDATE konten SET gambar_konten = ' . "'" . ((isset($a['gambarkonten'])) ? $a['gambarkonten'] : ' --') . "'" . '
                            , tulisan_konten = ' . "'" . $a['konten'] . "'" . '
						, kategori = ' . "'" . $a['kategori'] . "'" . '
						WHERE
							id_konten = ' . $a['id']
                );
            }else{
                $query = $this->db->query
                ('
						UPDATE konten SET tulisan_konten = ' . "'" . $a['konten'] . "'" . '
						, kategori = ' . "'" . $a['kategori'] . "'" . '
						WHERE
							id_konten = ' . $a['id']
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
                    UPDATE konten SET
                        status = 2
                    WHERE
                        id_konten = ' . $a
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
                    UPDATE konten SET
                        status = 1
                    WHERE
                        id_konten = ' . $a
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
                    UPDATE konten SET
                        status = 0
                    WHERE
                        id_konten = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
