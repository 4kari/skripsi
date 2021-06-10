<?php
class Penilaian_model extends CI_Model{
    public function getPenilaian($id=null){
        if ($id === null){
            return $this->db->get('Penilaian')->result_array();
        } else {
            return $this->db->get_where('Penilaian', ['id' => $id])->row_array();
        }
    }
    public function deletePenilaian($id){
        //data master tidak bisa dihapus
        $this->db->delete('Penilaian', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createPenilaian($data){
        $this->db->insert('Penilaian',$data);
        return $this->db->affected_rows();
    }
    public function updatePenilaian($data,$id){
        $this->db->update('Penilaian', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>