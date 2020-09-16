<?php

// extends class Model
class UserM extends CI_Model
{

    // response jika field ada yang kosong
    public function empty_response()
    {
        $response['status'] = 502;
        $response['error'] = true;
        $response['message'] = 'Field tidak boleh kosong';
        return $response;
    }

    // function untuk insert data ke tabel tb_person
    public function add_user($email, $nama, $nohp, $pekerjaan)
    {

        if (empty($email) || empty($nama) || empty($nohp) || empty($pekerjaan)) {
            return $this->empty_response();
        } else {
            $data = array(
                "email" => $email,
                "nama" => $nama,
                "nohp" => $nohp,
                "pekerjaan" => $pekerjaan
            );

            $insert = $this->db->insert("tb_user", $data);

            if ($insert) {
                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = 'Data person ditambahkan.';
                return $response;
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['message'] = 'Data person gagal ditambahkan.';
                return $response;
            }
        }
    }

    // mengambil semua data person
    public function all_user()
    {

        $all = $this->db->get("tb_user")->result();
        $response['status'] = 200;
        $response['error'] = false;
        $response['person'] = $all;
        return $response;
    }

    // hapus data person
    public function delete_user($id)
    {

        if ($id == '') {
            return $this->empty_response();
        } else {
            $where = array(
                "id" => $id
            );

            $this->db->where($where);
            $delete = $this->db->delete("tb_user");
            if ($delete) {
                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = 'Data person dihapus.';
                return $response;
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['message'] = 'Data person gagal dihapus.';
                return $response;
            }
        }
    }

    // update person
    public function update_user($id, $email, $nama, $nohp, $pekerjaan)
    {

        if ($id == '' || empty($email) || empty($nama) || empty($nohp) || empty($pekerjaan)) {
            return $this->empty_response();
        } else {
            $where = array(
                "id" => $id
            );

            $set = array(
                "email" => $email,
                "nama" => $nama,
                "nohp" => $nohp,
                "pekerjaan" => $pekerjaan
            );

            $this->db->where($where);
            $update = $this->db->update("tb_user", $set);
            if ($update) {
                $response['status'] = 200;
                $response['error'] = false;
                $response['message'] = 'Data person diubah.';
                return $response;
            } else {
                $response['status'] = 502;
                $response['error'] = true;
                $response['message'] = 'Data person gagal diubah.';
                return $response;
            }
        }
    }
}
