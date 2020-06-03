<?php

require APPPATH . 'libraries/REST_Controller.php';

class Sppt extends REST_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('SpptM');
  }

  public function index_get(){
    $response = $this->SpptM->all_sppt();
    $this->response($response);
  }

  public function item_get(){
    $nama   = $this->get('nama');
    $tahun  = $this->get('tahun');

    $data = $this->SpptM->get_sppt($nama,$tahun);
    if ($data->row()) {
      $this->response($data, REST_Controller::HTTP_OK); 
    }else{
      $this->response([
          'status' => '502',
          'error'  => 'true',
          'message'=> 'Data Tidak Ada',
      ], REST_Controller::HTTP_OK);
    }
  }

  public function add_post(){
    $response = $this->SpptM->add_sppt(
        $this->post('nop'),
        $this->post('nama'),
        $this->post('tahun'),
        $this->post('alamat'),
        $this->post('payment_flag')
      );
    $this->response($response);
  }

  public function update_put(){

    $response = $this->SpptM->update_sppt(
        $this->put('nop'),
        $this->put('tahun'),
        $this->put('payment_flag')
      );
    $this->response($response);
  }

  public function login_get(){
    $username = $this->get('nama');
    $password = md5($this->get('password'));

    $data = $this->SpptM->login_sppt($username);
    if ($data->row()) {
      $passwordPass = $data->row()->password;
      if ($password==$passwordPass) {
        $this->response([
            'status' => '200',
            'error'  => 'false',
            'message'=> 'Login Berhasil',
        ], REST_Controller::HTTP_OK);
      }else{
        $this->response([
            'status' => '200',
            'error'  => 'false',
            'message'=> 'Password Salah',
        ], REST_Controller::HTTP_OK);
      }
      
    }else{
      $this->response([
          'status' => '502',
          'error'  => 'true',
          'message'=> 'Login Gagal',
      ], REST_Controller::HTTP_OK);
    }
  }

 

  // hapus data person menggunakan method delete
  // public function delete_delete(){
  //   $response = $this->PersonM->delete_person(
  //       $this->delete('id')
  //     );
  //   $this->response($response);
  // }

}

?>
