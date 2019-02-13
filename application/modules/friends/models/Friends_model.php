<?php
class Friends_model extends CI_Model
{
    protected $table = 'friend';

    function __construct()
    {
        parent:: __construct();
        
    }
    public function get_count() {
        return $this->db->count_all($this->table);
    }
    public function get_friends($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function add_friend()
    {
        $data = array(
            "friend_name" => $this->input->post("first_name"),
            "friend_age" => $this->input->post("age"),
            "friend_gender" => $this->input->post("gender"),
            "friend_hobby" => $this->input->post("hobby"),
        );
        if ($this->db->insert("friend", $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function get_friend($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("created", "DESC");
        return $this->db->get("friend");
    }
    public function get_single_friend($friend_id)
    {
        $this->db->where("friend_id", $friend_id);
        return $this->db->get("friend");
    }

    public function delete($id)
    {   
    $this->db->where('friend_id', $id);
    
    //Retruns user to the same page if it succeeds
    if($this->db->delete('friend'))
    {
        return true;
    }
    else
    {
        return false;
    }
    
    }
}
