<?php

class JurnalModel {

    private $table = "jurnal";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllJurnal() {
        $this->db->query("SELECT jurnal.*, ilmu.nama_ilmu FROM " . $this->table . " JOIN ilmu ON ilmu.nama_ilmu = jurnal.ilmu_nama");
        return $this->db->resultSet();
    }

    public function tambahJurnal($data) {
        $this->db->query("INSERT INTO jurnal (nama_jurnal, nama_penerbit, ilmu_nama) 
            VALUES (:nama_jurnal, :nama_penerbit, :ilmu_nama)");
        $this->db->bind('nama_jurnal', $data['nama_jurnal']);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);
        $this->db->bind('ilmu_nama', $data['ilmu_nama']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getJurnalById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateJurnal($data) {
        $this->db->query("UPDATE jurnal SET nama_jurnal=:nama_jurnal, `nama_penerbit`=:nama_penerbit, ilmu_nama=:ilmu_nama WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_jurnal', $data['nama_jurnal']);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);
        $this->db->bind('ilmu_nama', $data['ilmu_nama']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    

    public function cariJurnal() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_jurnal LIKE :key OR nama_penerbit LIKE :key OR ilmu_nama LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    
    
    
    

    public function deleteJurnal($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
