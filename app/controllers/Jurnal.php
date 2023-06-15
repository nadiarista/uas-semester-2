<?php
class jurnal extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Jurnal';
        $data['jurnal']=$this->model('JurnalModel')->getAllJurnal();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jurnal/index', $data);
        $this->view('templates/footer');
    }




    public function tambahJurnal(){
        $data['title'] = 'Tambah Data Jurnal';
        $data['ilmu']=$this->model('IlmuModel')->getAllIlmu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jurnal/create', $data);
        $this->view('templates/footer');
    }
    public function simpanJurnal(){
        if( $this->model('JurnalModel')->tambahJurnal($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/jurnal');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/jurnal');
            exit;
        }
    }  



    
    public function editJurnal($id){
        $data['title'] = 'Detail Data Jurnal';
        $data['ilmu']=$this->model('IlmuModel')->getAllIlmu();
        $data['jurnal'] = $this->model('JurnalModel')->getJurnalById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jurnal/edit', $data);
        $this->view('templates/footer');
    }
    public function updateJurnal(){
        if( $this->model('JurnalModel')->updateJurnal($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/jurnal');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/jurnal');
            exit;
        }
    }  


    

    public function cariJurnal(){
        $data['title'] = 'Data Jurnal';
        $data['jurnal'] = $this->model('JurnalModel')->cariJurnal();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jurnal/index', $data);
        $this->view('templates/footer');
    }
    public function hapusJurnal($id){
        if( $this->model('JurnalModel')->deleteJurnal($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/jurnal');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/jurnal');
            exit;
        }
    }  



}
