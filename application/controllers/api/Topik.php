<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Topik extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Topik_model','tm');
    }
    public function index_get(){
        $id = $this->get('id');
        if ($id == null) {
            $Topik = $this->tm->getTopik();
        } else{
            $Topik = $this->tm->getTopik($id);
        }
        if ($Topik){
            $this->response([
                'status' => true,
                'data' =>$Topik
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
            $this->response([
                'status' => false,
                'message' => 'tambahkan id untuk hapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->tm->deleteTopik($id)>0){
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
            'topik' => $this->post('topik')
        ];
        
        if ($this->tm->createTopik($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Topik baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Topik baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'topik' => $this->put('topik')
        ];

        if ($this->tm->updateTopik($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Topik berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}