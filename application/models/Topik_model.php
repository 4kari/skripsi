<?php
class Topik_model extends CI_Model{
    public function getTopik($id=null){
        if ($id === null){
            return $this->db->get('Topik')->result_array();
        } else {
            return $this->db->get_where('Topik', ['id' => $id])->row_array();
        }
    }
    public function deleteTopik($id){
        //data master tidak bisa dihapus
        $this->db->delete('Topik', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createTopik($data){
        $this->db->insert('Topik',$data);
        return $this->db->affected_rows();
    }
    public function updateTopik($data,$id){
        $this->db->update('Topik', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>