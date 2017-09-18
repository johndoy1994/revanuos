<?php
class Setting_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    
    function getSetting(){

        $this->db->select('*');
        $this->db->from('setting');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function selectSettingData($data){
        
        $query = $this->db->get_where('setting',$data);
        $rs = $query->result();
        return $rs;
    }

    function updateSetting($data){
        $this->db->where('id', $data['id']);
        $this->db->update('setting' ,$data);
        return true;
    }
    
    function selecthomeData($page_type=1){

        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('page_type', $page_type);
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function selecttestimonialData(){

        $this->db->select('*');
        $this->db->from('testimonial');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function selectportfolioData() {

        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
    function selectcareerData() {

        $this->db->select('*');
        $this->db->from('career');
        $query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
    
}
?>