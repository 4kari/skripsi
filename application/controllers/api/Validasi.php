<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Validasi extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Validasi_model','mValidasi');
    }
    public function index_get(){
        $id = $this->get('id');
        $id_skripsi = $this->get('id_skripsi');
        if ($id) {
            $Validasi = $this->mValidasi->getValidasiById($id);
        }elseif($id_skripsi){
            $Validasi = $this->mValidasi->getValidasiBySkripsi($id_skripsi);
        } else{
            $Validasi = $this->mValidasi->getValidasi();
        }
        $data=$Validasi;
        $Validasi = $this->mValidasi->olahByTipe($data);
        if ($Validasi){
            $this->response([
                'status' => true,
                'data' =>$Validasi
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
            if ($this->mValidasi->deleteValidasi($id)>0){
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
            'id_skripsi' => $this->post('id_skripsi'),
            'tipe' => $this->post('tipe')
        ];
        
        if ($this->mValidasi->createValidasi($data)>0){
            $this->response([
                'status' => true,
                'message' => 'Validasi baru berhasil dibuat'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan Validasi baru'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id=$this->put('id');
        $data=[
            'keterangan' => $this->put('keterangan'),
            'tipe' => $this->put('tipe')
        ];

        if ($this->mValidasi->updateValidasi($data,$id)>0){
            $this->response([
                'status' => true,
                'message' => 'Validasi berhasil di perbarui'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal memperbarui data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}