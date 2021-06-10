<?php
class Status_model extends CI_Model{
    public function getStatus($id=null){
        if ($id === null){
            return $this->db->get('Status')->result_array();
        } else {
            return $this->db->get_where('Status', ['id' => $id])->row_array();
        }
    }
    public function deleteStatus($id){
        //data master tidak bisa dihapus
        $this->db->delete('Status', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createStatus($data){
        $this->db->insert('Status',$data);
        return $this->db->affected_rows();
    }
    public function updateStatus($data,$id){
        $this->db->update('Status', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>