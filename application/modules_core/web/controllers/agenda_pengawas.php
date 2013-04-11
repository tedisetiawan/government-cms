<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class agenda_pengawas extends MX_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
      $d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
      $d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
      $d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
      $d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
      $d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
      $d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);
      $d['dt_polling'] = $this->app_global_model->generate_menu_polling();
      $d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
      $d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
      $d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
      $d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
      $d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
	  
	  $d['dt_berita_pengawas'] = $this->app_global_model->generate_menu_berita_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
	  $d['dt_artikel_pengawas'] = $this->app_global_model->generate_menu_artikel_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
	  $d['dt_pengumuman_pengawas'] = $this->app_global_model->generate_menu_pengumuman_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
	  $d['dt_agenda_pengawas'] = $this->app_global_model->generate_menu_agenda_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);

      $this->breadcrumb->append_crumb('Beranda', base_url());
      $this->breadcrumb->append_crumb('Indexs Agenda Pengawas', '/');

      $d['dt_unit_dropdown'] = $this->db->get("dlmbg_super_unit_kerja");
	  $filter['id_unit_kerja'] = $this->session->userdata("by_id_unit_kerja");
	  $filter['tanggal'] = $this->session->userdata("by_tanggal");
      $d['dt_index_agenda'] = $this->app_global_model->generate_index_agenda_pengawas($this->config->item('limit_item_medium'),$uri,$filter);

      $this->load->view($_SESSION['site_theme'].'/bg_header',$d);
      if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
      $this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
      $this->load->view($_SESSION['site_theme'].'/bg_left');
      $this->load->view($_SESSION['site_theme'].'/agenda_pengawas/bg_home');
      $this->load->view($_SESSION['site_theme'].'/bg_right');
      $this->load->view($_SESSION['site_theme'].'/bg_footer');
   }
 
   public function detail($id_agenda)
   {
      $where['id_pengawas_agenda'] = $id_agenda;
      $get_data = $this->db->get_where("dlmbg_pengawas_agenda",$where);
      $ret_data = $get_data->row();
      if($get_data->num_rows()>0)
      {
			$this->breadcrumb->append_crumb('Beranda', base_url());
			$this->breadcrumb->append_crumb('Indexs Agenda Pengawas', base_url().'web/agenda_pengawas');
			$this->breadcrumb->append_crumb($ret_data->judul, '/');

			$d['menu_atas'] = $this->app_global_model->generate_menu('0','atas',$h='','treemenu1');
			$d['menu_bawah'] = $this->app_global_model->generate_menu('0','bawah',$h='');
			$d['dt_bidang'] = $this->app_global_model->generate_menu_bidang();
			$d['dt_link'] = $this->app_global_model->generate_menu_link_terkait();
			$d['dt_pengumuman'] = $this->app_global_model->generate_menu_pengumuman($_SESSION['limit_sidebar_pengumuman'],0);
			$d['dt_agenda'] = $this->app_global_model->generate_menu_agenda($_SESSION['limit_sidebar_agenda'],0);
			$d['dt_polling'] = $this->app_global_model->generate_menu_polling();
			$d['dt_statistik'] = $this->app_global_model->generate_menu_statistik();
			$d['dt_artikel_sekolah'] = $this->app_global_model->generate_menu_artikel_sekolah($_SESSION['limit_footer_artikel_sekolah'],0);
			$d['dt_galeri'] = $this->app_global_model->generate_menu_galeri_kegiatan(8,0);
			$d['dt_berita_slide_content'] = $this->app_global_model->generate_menu_slider_content($_SESSION['site_limit_berita_slider'],0);
			$d['dt_berita_slide_navigator'] = $this->app_global_model->generate_menu_slider_navigator($_SESSION['site_limit_berita_slider'],0);
	  
		  $d['dt_berita_pengawas'] = $this->app_global_model->generate_menu_berita_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
		  $d['dt_artikel_pengawas'] = $this->app_global_model->generate_menu_artikel_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
		  $d['dt_pengumuman_pengawas'] = $this->app_global_model->generate_menu_pengumuman_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);
		  $d['dt_agenda_pengawas'] = $this->app_global_model->generate_menu_agenda_pengawas($_SESSION['limit_footer_artikel_sekolah'],0);

			$d['dt_detail_agenda'] = $this->app_global_model->generate_detail_agenda_pengawas($id_agenda);

			$this->load->view($_SESSION['site_theme'].'/bg_header',$d);
			if($_SESSION['site_slider_always']=="yes"){$this->load->view($_SESSION['site_theme'].'/bg_slider');}
			$this->load->view($_SESSION['site_theme'].'/bg_breadcumb');
			$this->load->view($_SESSION['site_theme'].'/bg_left');
			$this->load->view($_SESSION['site_theme'].'/agenda_pengawas/bg_detail');
			$this->load->view($_SESSION['site_theme'].'/bg_right');
			$this->load->view($_SESSION['site_theme'].'/bg_footer');
      }
      else
      {
	      	redirect(base_url());
      }
   }
 
   public function set()
   {
      $sess['by_id_unit_kerja'] = $this->input->post("id_unit_kerja");
      $sess['by_tanggal'] = $this->input->post("tanggal");
	  $this->session->set_userdata($sess);
	  redirect("web/agenda_pengawas");
   }
}
 
/* End of file berita.php */
