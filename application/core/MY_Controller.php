<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $tpl_path = 'site';
	public $vd = array();

	public function __construct()
	{
		parent::__construct();
		$this->vd['assets_url'] = base_url('assets/site').'/';
	}

	public function _v($tpl, $has_hf = true)
	{
		$tpl_path = ($this->tpl_path!=='' OR $this->tpl_path !== false)?$this->tpl_path.'/':'';
		if ($has_hf) $this->load->view('base/_header_view',$this->vd);
		$this->load->view($tpl_path.str_replace('_view', '', $tpl).'_view',$this->vd);
		if ($has_hf) $this->load->view('base/_footer_view',$this->vd);
	}

	public function _vf($tpl, $has_hf = true)
	{
		$tpl_path = ($this->tpl_path!=='' OR $this->tpl_path !== false)?$this->tpl_path.'/':'';
		if ($has_hf) $this->load->view($tpl_path.'_header_view',$this->vd);
		$this->load->view($tpl_path.str_replace('_view', '', $tpl).'_view',$this->vd);
		if ($has_hf) $this->load->view($tpl_path.'_footer_view',$this->vd);
	}
  
  public function _add_view_data($var_name, $data) {
    $this->vd[$var_name] = $data;
  }

	public function _is_posted()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') return true; else return false;
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
