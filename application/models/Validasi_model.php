<?php
class Validasi_model extends CI_Model{
    public function getValidasi(){
        return $this->db->get('Validasi')->result_array();
    }
    public function getValidasiById($id){
        return $this->db->get_where('Validasi', ['id' => $id])->result_array();
    }
    public function getValidasiBySkripsi($id){
        return $this->db->get_where('validasi',['id_skripsi'=>$id])->result_array();
    }
    public function deleteValidasi($id){
        //data master tidak bisa dihapus
        $this->db->delete('Validasi', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createValidasi($data){
        $this->db->insert('Validasi',$data);
        return $this->db->affected_rows();
    }
    public function updateValidasi($data,$id){
        $this->db->update('Validasi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>