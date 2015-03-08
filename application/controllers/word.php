<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Welcome extends CI_Controller {
	public function index() {
		$this->load->view ( 'head' );
		$this->load->view ( 'welcome_message' );
		$this->load->view ( 'footer' );
	}
	public function choseong($choseong) {
		$this->load->view ( 'head' );
		$this->load->model ( 'word_model' );
		$word_list = $this->word_model->get_byt_choseong ( $choseong );
		$this->load->view ( 'choseong_list', array (
				'choseong' => $choseong 
		) );
		$this->load->view ( 'word_list', array (
				'word_list' => $word_list 
		) );
		$this->load->view ( 'footer' );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */