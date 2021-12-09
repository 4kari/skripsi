<?php
class Penilaian_model extends CI_Model{
    public function getPenilaian($id=null,$penilai=null){
        return $this->db->get_where('Penilaian', ['id' => $id, 'penilai' => $penilai])->result_array();
    }
    public function deletePenilaian($id){
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