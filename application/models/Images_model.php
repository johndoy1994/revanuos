<?php
class Images_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    
    function getImages(){

        $this->db->select('*');
        $this->db->from('images');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function insertImages($data)
    {
    	$resul= $this->db->insert('images', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function selectImagesData($data){
        
        $query = $this->db->get_where('images',$data);
        $rs = $query->result();
        return $rs;
    }

    function updateImages($data){
        $this->db->where('id', $data['id']);
        $this->db->update('images' ,$data);
        return true;
    }
    
    function Images_delete($id){
    	$this->db->where('id', $id);
   	$this->db->delete('images');
    }
}
?>