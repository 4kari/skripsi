<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Penilaian extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Penilaian_model','mPenilaian');
    }
    public function index_get(){
        $id = $this->get('id_skripsi');
        $Penilaian = $this->mPenilaian->getPenilaian($id);
        if ($Penilaian){
            $this->response([
                'status' => true,
                'data' =>$Penilaian
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_post(){
        $data=[
            'id_skripsi' => $this->post('id_skripsi'),
            'penilai' => $this->post('penilai'),
            'kode_penilaian' => $this->post('kode_penilaian')
        ];
        if ($this->mPenilaian->createPenilaian($data,$this->post('nilai'))>0){
            $this->response([
                'status' => true,
                'message' => 'Penilaian baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Penilaian baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}