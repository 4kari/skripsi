<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Sasaran extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Sasaran_model','mSasaran');
    }
    public function index_get(){
        $id = $this->get('id');
        if ($id == null) {
            $Sasaran = $this->mSasaran->getSasaran();
        } else{
            $Sasaran = $this->mSasaran->getSasaran($id);
        }
        if ($Sasaran){
            $this->response([
                'status' => true,
                'data' =>$Sasaran
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete(){
        $id = $this->delete('id');
        if ($id == null){
            var_dump($id);
            $this->response([
                'status' => false,
                'message' => 'tambahkan id untuk hapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->mSasaran->deleteSasaran($id)>0){
                //ok
                $this->response([
                    'status' => true,
                    'message' => 'terhapus'
                ], REST_Controller::HTTP_NO_CONTENT);
            }
            else{
                $this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }          
        }
    }
    public function index_post(){
        $data=[
            'keterangan' => $this->post('keterangan')
        ];
        
        if ($this->mSasaran->createSasaran($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Sasaran baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Sasaran baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'keterangan' => $this->put('keterangan')
        ];

        if ($this->mSasaran->updateSasaran($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Sasaran berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}