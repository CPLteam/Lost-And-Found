<?php

class Penemuan extends CI_Controller
{
    public function index()
    {
        $this->load->model('Penemuan_model');
        $data['temuan'] = $this->Penemuan_model->getAllPenemuan();
        $this->load->view('templates/sb',$data);
        $this->load->view('penemuan/index',$data);
        
    }

    public function add_action(){
        $no_laporan = $this->input->post('no_laporan');
        $id_barang = $this->input->post('id_barang')
        $id_user = $this->input->post('id_user');
        $tgl_temuan = $this->input->post('tgl_temuan');
        $lokasi_penemuan = $this->input->post('lokasi_penemuan');
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $foto_barang = $this->input->post('foto_barang');

        $data = array(
            'no_laporan' => $no_laporan,
            'id_barang' => $id_barang,
            'id_user' => $id_user,
            'tgl_temuan' => $tgl_temuan,
            'lokasi_penemuan' => $lokasi_penemuan,
            'nama_barang' => $nama_barang,
            'deskripsi' => $deskripsi,
            'foto_barang'=> $foto_barang
        );
    
        $this->Penemuan_model->input_data($data,'temuan');
    redirect('penemuan/formpenemuan.php');
}
} 