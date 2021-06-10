<?php
class Skripsi_model extends CI_Model{
    public function getSkripsi($id=null){
        if ($id === null){
            return $this->db->get('Skripsi')->result_array();
        } else {
            return $this->db->get_where('Skripsi', ['id' => $id])->row_array();
        }
    }
    public function deleteSkripsi($id){
        //data master tidak bisa dihapus
        $this->db->delete('Skripsi', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createSkripsi($data){
        $this->db->insert('Skripsi',$data);
        return $this->db->affected_rows();
    }
    public function updateSkripsi($data,$id){
        $this->db->update('Skripsi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>