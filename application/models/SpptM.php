<?php

// extends class Model
class SpptM extends CI_Model{

  public function empty_response(){
    $response['status']="502";
    $response['error']="true";
    $response['message']="Field tidak boleh kosong";
    return $response;
  }
  public function file_exist(){
    $response['status']="400";
    $response['error']="true";
    $response['message']="Data sudah terisi";
    return $response;
  }

  public function login_sppt($username){
    $this->db->select('*');
    $this->db->from('sppt');
    $this->db->where('nama',$username);
    $this->db->limit(1);
    return $this->db->get();
  }
  public function add_sppt($nop,$nama,$tahun,$alamat,$payment_flag){
    if(empty($nop) || empty($nama) || empty($tahun) || empty($alamat) || empty($payment_flag)){
      return $this->empty_response();
    }
    else{
      $data = array(
        "nop"=>$nop,
        "nama"=>$nama,
        "tahun"=>$tahun,
        "alamat"=>$alamat,
        "payment_flag"=>$payment_flag
      );

      $insert = $this->db->insert("sppt", $data);

      if($insert){
        $response['status']="200";
        $response['error']="false";
        $response['message']="Status SPPT diubah.";
        return $response;
      }else{
        $response['status']="502";
        $response['error']="true";
        $response['message']="Status SPPT gagal diubah.";
        return $response;
      }
    }

  }

  public function update_sppt($nop,$tahun,$payment_flag){
    if($nop == '' || empty($tahun) || empty($payment_flag)){
      return $this->empty_response();
    }else{
      $where = array(
        "nop"=>$nop,
        "tahun"=>$tahun
      );

      $set = array(
        "payment_flag"=>$payment_flag
      );

      $this->db->where($where);
      $update = $this->db->update("sppt",$set);
      if($update){
        $response['status']="200";
        $response['error']="false";
        $response['message']='Data sppt tersampaikan.';
        return $response;
      }else{
        $response['status']="502";
        $response['error']="true";
        $response['message']='Data sppt gagal tesampaikan.';
        return $response;
      }
    }
  }

  public function all_sppt(){
    $all = $this->db->get("sppt")->result();
    // return $query->result();
    $response['status']="200";
    $response['error']="false";
    $response['sppt']=$all;
    return $response;

  }

  public function get_sppt($nama,$tahun){
    $item = $this->db->select('*');
    $item = $this->db->from('sppt');
    $item = $this->db->where('nama',$nama);
    $item = $this->db->where('tahun',$tahun);
    $item = $this->db->limit(1);

    $response['status']="200";
    $response['error']="false";
    $response['sppt']=$item;
    return $this->db->get();

  }

  // public function delete_person($id){

  //   if($id == ''){
  //     return $this->empty_response();
  //   }else{
  //     $where = array(
  //       "id"=>$id
  //     );

  //     $this->db->where($where);
  //     $delete = $this->db->delete("tb_person");
  //     if($delete){
  //       $response['status']=200;
  //       $response['error']=false;
  //       $response['message']='Data person dihapus.';
  //       return $response;
  //     }else{
  //       $response['status']=502;
  //       $response['error']=true;
  //       $response['message']='Data person gagal dihapus.';
  //       return $response;
  //     }
  //   }

  // }

  
}

?>
