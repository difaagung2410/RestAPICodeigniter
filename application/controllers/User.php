<?php

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller
{

  // construct
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get()
  {
    $response = $this->UserM->all_user();
    $this->response($response);
  }

  // untuk menambah person menaggunakan method post
  public function add_post()
  {
    $response = $this->UserM->add_user(
      $this->post('email'),
      $this->post('nama'),
      $this->post('nohp'),
      $this->post('pekerjaan')
    );
    $this->response($response);
  }

  // update data person menggunakan method put
  public function update_put()
  {
    $response = $this->UserM->update_user(
      $this->put('id'),
      $this->put('email'),
      $this->put('nama'),
      $this->put('nohp'),
      $this->put('pekerjaan')
    );
    $this->response($response);
  }

  // hapus data person menggunakan method delete
  public function delete_delete()
  {
    $response = $this->UserM->delete_user(
      $this->delete('id')
    );
    $this->response($response);
  }
}
