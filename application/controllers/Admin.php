<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("layanan"));
		}
        $this->load->model('m_admin');
        $this->load->model('m_message');
        $this->load->model('m_website_desa');
        $this->load->model('m_hak_akses_web');
        $this->load->model('m_hak_akses_matur_bupati');
        $this->load->model('m_fasilitas_inter_wifi');
        $this->load->model('m_fasilitas_video_conference');
        $this->load->model('m_aduan_pengelolaan_website');
        $this->load->model('m_aduan_jaringan_internet');
    }
    

    public function index()
    {   
        $data['acc'] = array (
            'webdesa'=> $this->m_admin->acc_webdes(),
            'hak_akses_web' => $this->m_admin->acc_hakaksesweb(),
            'hak_akses_matur_bupati' => $this->m_admin->acc_maturbup(),
            'fasilitas_inter_wifi' => $this->m_admin->acc_fasinter(),
            'fasilitas_video_conference' => $this->m_admin->acc_fasvid(),
            'aduan_pengelolaan_website' => $this->m_admin->acc_aduanweb(),
            'aduan_jaringan_internet' => $this->m_admin->acc_aduaninter(),
        );

        $data['proses'] = array (
            'webdesa'=> $this->m_admin->proses_webdes(),
            'hak_akses_web' => $this->m_admin->proses_hakaksesweb(),
            'hak_akses_matur_bupati' => $this->m_admin->proses_maturbup(),
            'fasilitas_inter_wifi' => $this->m_admin->proses_fasinter(),
            'fasilitas_video_conference' => $this->m_admin->proses_fasvid(),
            'aduan_pengelolaan_website' => $this->m_admin->proses_aduanweb(),
            'aduan_jaringan_internet' => $this->m_admin->proses_aduaninter(),
        );

        $data['dc'] = array (
            'webdesa'=> $this->m_admin->dc_webdes(),
            'hak_akses_web' => $this->m_admin->dc_hakaksesweb(),
            'hak_akses_matur_bupati' => $this->m_admin->dc_maturbup(),
            'fasilitas_inter_wifi' => $this->m_admin->dc_fasinter(),
            'fasilitas_video_conference' => $this->m_admin->dc_fasvid(),
            'aduan_pengelolaan_website' => $this->m_admin->dc_aduanweb(),
            'aduan_jaringan_internet' => $this->m_admin->dc_aduaninter(),
        );

        $data['all'] = array (
            'webdesa'=> $this->m_admin->all_webdes(),
            'hak_akses_web' => $this->m_admin->all_hakaksesweb(),
            'hak_akses_matur_bupati' => $this->m_admin->all_maturbup(),
            'fasilitas_inter_wifi' => $this->m_admin->all_fasinter(),
            'fasilitas_video_conference' => $this->m_admin->all_fasvid(),
            'aduan_pengelolaan_website' => $this->m_admin->all_aduanweb(),
            'aduan_jaringan_internet' => $this->m_admin->all_aduaninter(),
        );

        $jmlacc["jmlacc"] = array_sum($data['acc']);
        $jmlproses["jmlproses"] = array_sum($data['proses']);
        $jmldc["jmldc"] = array_sum($data['dc']);
        $jmlall["jmlall"] = array_sum($data['all']);

        $jmlacc['webdesa'] = $this->m_admin->acc_webdes();
        $jmlacc['hak_akses_web'] = $this->m_admin->acc_hakaksesweb();
        $jmlacc['hak_akses_matur_bupati'] = $this->m_admin->acc_maturbup();
        $jmlacc['fasilitas_inter_wifi'] = $this->m_admin->acc_fasinter();
        $jmlacc['fasilitas_video_conference'] = $this->m_admin->acc_fasvid();
        $jmlacc['aduan_pengelolaan_website'] = $this->m_admin->acc_aduanweb();
        $jmlacc['aduan_jaringan_internet'] = $this->m_admin->acc_aduaninter();

        $jmlproses['webdesa'] = $this->m_admin->proses_webdes();
        $jmlproses['hak_akses_web'] = $this->m_admin->proses_hakaksesweb();
        $jmlproses['hak_akses_matur_bupati'] = $this->m_admin->proses_maturbup();
        $jmlproses['fasilitas_inter_wifi'] = $this->m_admin->proses_fasinter();
        $jmlproses['fasilitas_video_conference'] = $this->m_admin->proses_fasvid();
        $jmlproses['aduan_pengelolaan_website'] = $this->m_admin->proses_aduanweb();
        $jmlproses['aduan_jaringan_internet'] = $this->m_admin->proses_aduaninter();

        $jmldc['webdesa'] = $this->m_admin->dc_webdes();
        $jmldc['hak_akses_web'] = $this->m_admin->dc_hakaksesweb();
        $jmldc['hak_akses_matur_bupati'] = $this->m_admin->dc_maturbup();
        $jmldc['fasilitas_inter_wifi'] = $this->m_admin->dc_fasinter();
        $jmldc['fasilitas_video_conference'] = $this->m_admin->dc_fasvid();
        $jmldc['aduan_pengelolaan_website'] = $this->m_admin->dc_aduanweb();
        $jmldc['aduan_jaringan_internet'] = $this->m_admin->dc_aduaninter();

        $jmlall['webdesa'] = $this->m_admin->all_webdes();
        $jmlall['hak_akses_web'] = $this->m_admin->all_hakaksesweb();
        $jmlall['hak_akses_matur_bupati'] = $this->m_admin->all_maturbup();
        $jmlall['fasilitas_inter_wifi'] = $this->m_admin->all_fasinter();
        $jmlall['fasilitas_video_conference'] = $this->m_admin->all_fasvid();
        $jmlall['aduan_pengelolaan_website'] = $this->m_admin->all_aduanweb();
        $jmlall['aduan_jaringan_internet'] = $this->m_admin->all_aduaninter();

        $data["title"] = "Dashboard";
        $data['message'] = $this->m_message->tampil_data()->result();
        $data['jmlall'] = $jmlall;
        $data["jmlproses"] = $jmlproses;
        $data["jmldc"] = $jmldc;
        $data["jmlall"] = $jmlall;

        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin', [
            'message' => $data['message'],

            'jmlacc' => $jmlacc['jmlacc'],
            'jmlproses' => $jmlproses['jmlproses'],
            'jmldc' => $jmldc['jmldc'],
            'jmlall' => $jmlall['jmlall'],

            'accwebdesa' => $jmlacc['webdesa'],
            'acchak_akses_web' => $jmlacc['hak_akses_web'],
            'acchak_akses_matur_bupati' => $jmlacc['hak_akses_matur_bupati'],
            'accfasilitas_inter_wifi' => $jmlacc['fasilitas_inter_wifi'],
            'accfasilitas_video_conference' => $jmlacc['fasilitas_video_conference'],
            'accaduan_pengelolaan_website' => $jmlacc['aduan_pengelolaan_website'],
            'accaduan_jaringan_internet' => $jmlacc['aduan_jaringan_internet'],
            
            'proseswebdesa' => $jmlproses['webdesa'],
            'proseshak_akses_web' => $jmlproses['hak_akses_web'],
            'proseshak_akses_matur_bupati' => $jmlproses['hak_akses_matur_bupati'],
            'prosesfasilitas_inter_wifi' => $jmlproses['fasilitas_inter_wifi'],
            'prosesfasilitas_video_conference' => $jmlproses['fasilitas_video_conference'],
            'prosesaduan_pengelolaan_website' => $jmlproses['aduan_pengelolaan_website'],
            'prosesaduan_jaringan_internet' => $jmlproses['aduan_jaringan_internet'],
        
            'dcwebdesa' => $jmldc['webdesa'],
            'dchak_akses_web' => $jmldc['hak_akses_web'],
            'dchak_akses_matur_bupati' => $jmldc['hak_akses_matur_bupati'],
            'dcfasilitas_inter_wifi' => $jmldc['fasilitas_inter_wifi'],
            'dcfasilitas_video_conference' => $jmldc['fasilitas_video_conference'],
            'dcaduan_pengelolaan_website' => $jmldc['aduan_pengelolaan_website'],
            'dcaduan_jaringan_internet' => $jmldc['aduan_jaringan_internet'],

            'allwebdesa' => $jmlall['webdesa'],
            'allhak_akses_web' => $jmlall['hak_akses_web'],
            'allhak_akses_matur_bupati' => $jmlall['hak_akses_matur_bupati'],
            'allfasilitas_inter_wifi' => $jmlall['fasilitas_inter_wifi'],
            'allfasilitas_video_conference' => $jmlall['fasilitas_video_conference'],
            'alladuan_pengelolaan_website' => $jmlall['aduan_pengelolaan_website'],
            'alladuan_jaringan_internet' => $jmlall['aduan_jaringan_internet'],

        ]);
       $this->load->view('admin/footer');
    }

    

    public function delete_msg($id_message)
    {
        $data = array('id_message' => $id_message );
        $this->m_message->delete($data);
        redirect('admin', 'refresh');
    }

    
    public function webdesa()
    {
        $data['title'] = "Website Desa / OpenSID";
        $data['keyword'] = $this->input->get('keyword');

        $config['base_url'] = base_url('admin/webdesa');

        $this->db->from('website_desa');
        $data['website_desa'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/website_desa', $data);
        $this->load->view('admin/footer');
    }

    
    public function download_web_desa($id_web_desa)
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_website_desa->download_file($id_web_desa);
        
        foreach ($query as $row)
        {
            $fileName1 = FCPATH."assets/website_desa/".$row->SK_Pengangkatan_Kades;
            $fileName2 = FCPATH."assets/website_desa/".$row->SK_Pengangkatan_Perangkat_Desa;
            $fileName3 = FCPATH."assets/website_desa/".$row->Surat_Kuasa;
            $fileName4 = FCPATH."assets/website_desa/".$row->Surat_Permohonan_Domain;
            $fileName5 = FCPATH."assets/website_desa/".$row->Surat_Permohonan_Hosting;
            $fileName6 = FCPATH."assets/website_desa/".$row->KTP;

            $this->zip->read_file($fileName1);
            $this->zip->read_file($fileName2);
            $this->zip->read_file($fileName3);
            $this->zip->read_file($fileName4);
            $this->zip->read_file($fileName5);
            $this->zip->read_file($fileName6);
        }
        $filename = "website-desa-$row->nama.zip";
        $this->zip->download($filename);

    }

    public function delete_webdesa( $id_web_desa = NULL )
    {
        //hapus
        $webdesa = $this->m_website_desa->get_data($id_web_desa);
        if ($webdesa->SK_Pengangkatan_Kades != "") {
            unlink('assets/website_desa/'. $webdesa->SK_Pengangkatan_Kades);
        }
        if ($webdesa->SK_Pengangkatan_Perangkat_Desa != "") {
            unlink('assets/website_desa/'. $webdesa->SK_Pengangkatan_Perangkat_Desa);
        }
        if ($webdesa->Surat_Kuasa != "") {
            unlink('assets/website_desa/'. $webdesa->Surat_Kuasa);
        }
        if ($webdesa->Surat_Permohonan_Domain != "") {
            unlink('assets/website_desa/'. $webdesa->Surat_Permohonan_Domain);
        }
        if ($webdesa->Surat_Permohonan_Hosting != "") {
            unlink('assets/website_desa/'. $webdesa->Surat_Permohonan_Hosting);
        }
        if ($webdesa->KTP != "") {
            unlink('assets/website_desa/'. $webdesa->KTP);
        }
        
        //end
        $data = array('id_web_desa' => $id_web_desa );
        $this->m_website_desa->delete($data);
        redirect('admin/webdesa', 'refresh');
    }

    public function edit_webdesa( $id_web_desa = NULL )
    {
        $data = array(
            'id_web_desa' => $id_web_desa,
            'status' => $this->input->post('status'),
         );
         $this->m_website_desa->edit($data);
         redirect('admin/webdesa', 'refresh');
    }

    public function hakaksesweb()
    {
        $data['title'] = "Hak Akses Web";
        
        $this->db->from('hak_akses_website');
        $data['hak_akses_web'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/hak_akses_website', $data);
        $this->load->view('admin/footer');
    }


    public function download_hak_akses_web($id_hak_akses_web)
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_hak_akses_web->download_file($id_hak_akses_web);
        
        foreach ($query as $row)
        {
            $fileName1 = FCPATH."assets/hak_akses_web/".$row->surat_permohonan;
            $fileName2 = FCPATH."assets/hak_akses_web/".$row->sk;

            $this->zip->read_file($fileName1);
            $this->zip->read_file($fileName2);
        }
        $filename = "hak-akses-web-$row->nama.zip";
        $this->zip->download($filename);

    }

    public function delete_hakaksesweb( $id_hak_akses_web = NULL )
    {
        //hapus
        $hakaksesweb = $this->m_hak_akses_web->get_data($id_hak_akses_web);
        if ($hakaksesweb->surat_permohonan != "") {
            unlink('assets/hak_akses_web/'. $hakaksesweb->surat_permohonan);
        }
        if ($hakaksesweb->sk != "") {
            unlink('assets/hak_akses_web/'. $hakaksesweb->sk);
        }
        
        //end
        $data = array('id_hak_akses_web' => $id_hak_akses_web );
        $this->m_hak_akses_web->delete($data);
        redirect('admin/hakaksesweb', 'refresh');
    }

    public function edit_hakaksesweb( $id_hak_akses_web = NULL )
    {
        $data = array(
            'id_hak_akses_web' => $id_hak_akses_web,
            'status' => $this->input->post('status'),
         );
         $this->m_hak_akses_web->edit($data);
         redirect('admin/hakaksesweb', 'refresh');
    }

    public function maturbup()
    {
        $data['title'] = "Hak Akses Matur Bupati";
    
        $this->db->from('hak_akses_matur_bupati');
        $data['hak_akses_matur_bupati'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/hak_akses_matur_bupati', $data);
        $this->load->view('admin/footer');
    }


    public function download_hak_akses_maturbup($id_hak_akses_maturbup )
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_hak_akses_matur_bupati->download_file($id_hak_akses_maturbup );
        
        foreach ($query as $row)
        {
            $fileName1 = FCPATH."assets/hak_akses_matur_bupati/".$row->surat_permohonan;
            $fileName2 = FCPATH."assets/hak_akses_matur_bupati/".$row->sk;

            $this->zip->read_file($fileName1);
            $this->zip->read_file($fileName2);
        }
        $filename = "hak-akses-matur-bupati-$row->nama.zip";
        $this->zip->download($filename);

    }

    public function delete_maturbup( $id_hak_akses_maturbup = NULL )
    {
        //hapus
        $maturbup = $this->m_hak_akses_matur_bupati->get_data($id_hak_akses_maturbup);
        if ($maturbup->surat_permohonan != "") {
            unlink('assets/hak_akses_matur_bupati/'. $maturbup->surat_permohonan);
        }
        if ($maturbup->sk != "") {
            unlink('assets/hak_akses_matur_bupati/'. $maturbup->sk);
        }
        
        //end
        $data = array('id_hak_akses_maturbup' => $id_hak_akses_maturbup );
        $this->m_hak_akses_matur_bupati->delete($data);
        redirect('admin/maturbup', 'refresh');
    }

    public function edit_maturbup( $id_hak_akses_maturbup = NULL )
    {
        $data = array(
            'id_hak_akses_maturbup' => $id_hak_akses_maturbup,
            'status' => $this->input->post('status'),
         );
         $this->m_hak_akses_matur_bupati->edit($data);
         redirect('admin/maturbup', 'refresh');
    }


    public function fasinter()
    {
        $data['title'] = "Fasilitas Internet / Wifi";
        
        $this->db->from('fasilitas_inter_wifi');
        $data['fasilitas_inter_wifi'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/fasilitas_internet_wifi', $data);
        $this->load->view('admin/footer');
    }


    public function download_fasinter($id_fas_inter_wifi)
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_fasilitas_inter_wifi->download_file($id_fas_inter_wifi);
        
        foreach ($query as $row)
        {
            $fileName1 = FCPATH."assets/fasilitas_internet_wifi/".$row->surat_permohonan;

            $this->zip->read_file($fileName1);
        }
        $filename = "permohonan-fasilitas-internet-wifi-$row->nama.zip";
        $this->zip->download($filename);
    }

    public function delete_fasinter( $id_fas_inter_wifi = NULL )
    {
        //hapus
        $fasinter = $this->m_fasilitas_inter_wifi->get_data($id_fas_inter_wifi);
        if ($fasinter->surat_permohonan != "") {
            unlink('assets/fasilitas_internet_wifi/'. $fasinter->surat_permohonan);
        }
        
        //end
        $data = array('id_fas_inter_wifi' => $id_fas_inter_wifi );
        $this->m_fasilitas_inter_wifi->delete($data);
        redirect('admin/fasinter', 'refresh');
    }

    public function edit_fasinter( $id_fas_inter_wifi = NULL )
    {
        $data = array(
            'id_fas_inter_wifi' => $id_fas_inter_wifi,
            'status' => $this->input->post('status'),
         );
         $this->m_fasilitas_inter_wifi->edit($data);
         redirect('admin/fasinter', 'refresh');
    }

    public function fasvideo()
    {
        $data['title'] = "Fasilitas Video Conference";
        
        $this->db->from('fasilitas_video_conference');
        $data['fasilitas_video_conference'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/fasilitas_video_conference', $data);
        $this->load->view('admin/footer');
    }

    public function download_fasvideo($id_fas_video_conference )
    {
        // Load zip library
        $this->load->library('zip');
        
        $query = $this->m_fasilitas_video_conference->download_file($id_fas_video_conference);
        
        foreach ($query as $row)
        {
            $fileName1 = FCPATH."assets/fasilitas_video_conference/".$row->surat_permohonan;

            $this->zip->read_file($fileName1);
        }
        $filename = "permohonan-fasilitas-video-conference-$row->nama.zip";
        $this->zip->download($filename);
    }

    public function delete_fasvideo( $id_fas_video_conference = NULL )
    {
        //hapus
        $fasvideo = $this->m_fasilitas_video_conference->get_data($id_fas_video_conference);
        if ($fasvideo->surat_permohonan != "") {
            unlink('assets/fasilitas_video_conference/'. $fasvideo->surat_permohonan);
        }
        
        //end
        $data = array('id_fas_video_conference' => $id_fas_video_conference );
        $this->m_fasilitas_video_conference->delete($data);
        redirect('admin/fasvideo', 'refresh');
    }

    public function edit_fasvideo( $id_fas_video_conference = NULL )
    {
        $data = array(
            'id_fas_video_conference' => $id_fas_video_conference,
            'status' => $this->input->post('status'),
         );
         $this->m_fasilitas_video_conference->edit($data);
         redirect('admin/fasvideo', 'refresh');
    }

    public function aduanweb()
    {
        $data['title'] = "Aduan Pengelolaan Website";

        $this->db->from('aduan_pengelolaan_website');
        $data['aduan_pengelolaan_website'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/aduan_pengelolaan_website', $data);
        $this->load->view('admin/footer');
    }

    public function delete_aduanweb( $id_aduan_web = NULL )
    {
        $data = array('id_aduan_web' => $id_aduan_web );
        $this->m_aduan_pengelolaan_website->delete($data);
        redirect('admin/aduanweb', 'refresh');
    }

    public function edit_aduanweb( $id_aduan_web = NULL )
    {
        $data = array(
            'id_aduan_web' => $id_aduan_web,
            'status' => $this->input->post('status'),
         );
         $this->m_aduan_pengelolaan_website->edit($data);
         redirect('admin/aduanweb', 'refresh');
    }

    public function aduaninter(){
        $data['title'] = "Aduan Infrastruktur dan Jaringan Internet";
    
        $this->db->from('aduan_infrastruktur_jaringan_inter');
        $data['aduan_jaringan_internet'] = $this->db->get()->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/aduan_infrastruktur_dan_jaringan', $data);
        $this->load->view('admin/footer');
    }

    public function delete_aduaninter( $id_aduan_jar_inter = NULL )
    {
        $data = array('id_aduan_jar_inter' => $id_aduan_jar_inter );
        $this->m_aduan_jaringan_internet->delete($data);
        redirect('admin/aduaninter', 'refresh');
    }

    public function edit_aduaninter( $id_aduan_jar_inter = NULL )
    {
        $data = array(
            'id_aduan_jar_inter' => $id_aduan_jar_inter,
            'status' => $this->input->post('status'),
         );
         $this->m_aduan_jaringan_internet->edit($data);
         redirect('admin/aduaninter', 'refresh');
    }

}

/* End of file Admin.php */


?>