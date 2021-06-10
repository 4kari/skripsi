<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Status extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Status_model','mStatus');
    }
    public function index_get(){
        $id = $this->get('id');
        if ($id == null) {
            $Status = $this->mStatus->getStatus();
        } else{
            $Status = $this->mStatus->getStatus($id);
        }
        if ($Status){
            $this->response([
                'status' => true,
                'data' =>$Status
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
            if ($this->mStatus->deleteStatus($id)>0){
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
            'status' => $this->post('status')
        ];
        
        if ($this->mStatus->createStatus($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Status baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Status baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'status' => $this->put('status')
        ];

        if ($this->mStatus->updateStatus($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Status berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}