<?php
class User_model extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }
    //admin login
    function login($data)
    {
   
        $query = $this->db->get_where('tbl_user',$data);
        //$query = $this->db->get();
        $rs = $query->result();
        return $rs;
    }
}
?>