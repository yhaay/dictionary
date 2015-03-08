<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Word extends CI_Controller {
	public function index() {
		$this->load->view ( 'head' );
		$this->load->view ( 'welcome_message' );
		$this->load->view ( 'footer' );
	}
	public function choseong($choseong) {
		$this->load->view ( 'head' );
		$this->load->view ( 'choseong_list', array (
				'choseong' => $choseong 
		) );
		
		$this->load->model ( 'word_model' );
		$word_list = $this->word_model->get_by_choseong ( $choseong );
		if ($word_list->num_rows () > 0) {
			$this->load->view ( 'word_list', array (
					'word_list' => $word_list->result () 
			) );
		}
		
		$this->load->view ( 'footer' );
	}
	public function detail($wordidx) {
		$this->load->view ( 'head' );
		
		$this->load->model ( 'word_model' );
		$meaning_list = $this->word_model->get_meaning_by_wordidx ( $wordidx );
		$word = $this->word_model->get_word_by_wordidx($wordidx);
		if ($meaning_list->num_rows () > 0) {
			$this->load->view ( 'meaning_list', array (
					'meaning_list' => $meaning_list->result (),
					'word' => $word->result()
			) );
		}
		
		$this->load->view ( 'footer' );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */