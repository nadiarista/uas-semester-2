<?php

class IlmuModel {

    private $table = "ilmu";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllIlmu() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahIlmu($data){
        $this->db->query("INSERT INTO ilmu (nama_ilmu) VALUES(:nama_ilmu)");
        $this->db->bind('nama_ilmu',$data['nama_ilmu']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getIlmuById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateIlmu($data){
        $this->db->query("UPDATE ilmu SET nama_ilmu=:nama_ilmu WHERE id=:id");
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_ilmu',$data['nama_ilmu']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariIlmu(){
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_ilmu LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }

    public function deleteIlmu($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
