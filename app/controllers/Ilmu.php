<?php
class ilmu extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Imiah';
        $data['ilmu']=$this->model('IlmuModel')->getAllIlmu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ilmu/index', $data);
        $this->view('templates/footer');
    }




    public function tambahIlmu(){
        $data['title'] = 'Tambah Data Ilmiah';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ilmu/create', $data);
        $this->view('templates/footer');
    }
    public function simpanIlmu(){
        if( $this->model('IlmuModel')->tambahIlmu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/ilmu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/ilmu');
            exit;
        }
    }  



    
    public function editIlmu($id){
        $data['title'] = 'Detail Data Ilmiah';
        $data['ilmu'] = $this->model('IlmuModel')->getIlmuById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ilmu/edit', $data);
        $this->view('templates/footer');
    }
    public function updateIlmu(){
        if( $this->model('IlmuModel')->updateIlmu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/ilmu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/ilmu');
            exit;
        }
    }  


    

    public function cariIlmu(){
        $data['title'] = 'Data Ilmiah';
        $data['ilmu'] = $this->model('IlmuModel')->cariIlmu();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ilmu/index', $data);
        $this->view('templates/footer');
    }
    public function hapusIlmu($id){
        if( $this->model('IlmuModel')->deleteIlmu($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/ilmu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/ilmu');
            exit;
        }
    }  



}
