<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends RAST_Model {

    function get_list() {
        $query = $this->db->query
                ('
                    SELECT
                        *
                    FROM
                        users
                    WHERE
                        status = 1
                    ORDER BY
                        level asc
		');

        return $query->result_array();
    }

    function get_isi($a) {
        $query = $this->db->query
                ('
					SELECT
						*
					FROM
						users
					WHERE
						id = ' . $a
        );

        return $query->result_array();
    }

    function changePassword_process($post) {
        $aa = $this->db->query
                ('
					SELECT
						password
					FROM
						users
					WHERE
						id = ' . $this->session->userdata('user_id')
        );

        $op = $aa->row()->password;

        $query = FALSE;
        if ($op == md5($post['old_password'])) {
            $query = $this->db->query
                    ('
						UPDATE users SET
                            password = ' . "MD5('" . $post['new_password'] . "')" . '
						WHERE
							id = ' . $this->session->userdata('user_id')
            );
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function process($a) {
        $query = FALSE;
        $tgl = explode('/', $a['date_of_birth']);
        if ($a['id'] == '') {
            $query = $this->db->query
                    ('
                        INSERT INTO users VALUES
                        (
                            ' . "'" . "'" . '
                            , ' . "'" . $a['username'] . "'" . '
                            , ' . "MD5('" . $a['password'] . "')" . '
                            , ' . "'" . $a['id_card'] . "'" . '
                            , ' . "'" . $a['name'] . "'" . '
                            , ' . "'" . $a['phone'] . "'" . '
                            , ' . "'" . $a['address'] . "'" . '
                            , ' . "'" . $a['place_of_birth'] . "'" . '
                            , ' . "'" . $tgl[2] . '-' . $tgl[0] . '-' . $tgl[1] . "'" . '
                            , ' . "'" . $a['nationality'] . "'" . '
                            , ' . "'" . $a['gender'] . "'" . '
                            , ' . "'" . $a['level'] . "'" . '
                            , 1
                        )
                    ');
        } else {
            $query = $this->db->query
                    ('
						UPDATE users SET
                            username = ' . "'" . $a['username'] . "'" . '
                            ' . (($a['password'] != '') ? (', password = ' . "MD5('" . $a['password'] . "')") : '') . '
                            , id_card = ' . "'" . $a['id_card'] . "'" . '
                            , name = ' . "'" . $a['name'] . "'" . '
                            , phone = ' . "'" . $a['phone'] . "'" . '
                            , address = ' . "'" . $a['address'] . "'" . '
                            , place_of_birth = ' . "'" . $a['place_of_birth'] . "'" . '
                            , date_of_birth = ' . "'" . $tgl[2] . '-' . $tgl[0] . '-' . $tgl[1] . "'" . '
                            , nationality = ' . "'" . $a['nationality'] . "'" . '
                            , gender = ' . "'" . $a['gender'] . "'" . '
                            , level = ' . "'" . $a['level'] . "'" . '
						WHERE
							id = ' . $a['id']
            );
        }

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete($a) {
        $query = $this->db->query
                ('
                    UPDATE users SET
                        status = 0
                    WHERE
                        id = ' . $a
        );

        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
