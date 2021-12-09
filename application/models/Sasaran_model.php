<?php
class Sasaran_model extends CI_Model{
    public function getSasaran($tipe=null){
        if ($tipe === null){
            return $this->db->get('Sasaran')->result_array();
        } else {
            return $this->db->get_where('Sasaran', ['tipe' => $tipe])->result_array();
        }
    }
    public function deleteSasaran($id){
        //data master tidak bisa dihapus
        $this->db->delete('Sasaran', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createSasaran($data){
        $this->db->insert('Sasaran',$data);
        return $this->db->affected_rows();
    }
    public function updateSasaran($data,$id){
        $this->db->update('Sasaran', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>