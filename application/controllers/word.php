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
		$word = $this->word_model->get_word_by_wordidx ( $wordidx );
		if ($meaning_list->num_rows () > 0) {
			$this->load->view ( 'meaning_list', array (
					'meaning_list' => $meaning_list->result (),
					'word' => $word->row () 
			) );
		}
		
		$this->load->view ( 'footer' );
	}
	public function update_referral() {
		$meaningidx = $this->input->post ( 'meaningidx' );
		$this->load->model ( 'word_model' );
		
		if ($this->word_model->check_session_id ( 'referral', 'meaningidx', $meaningidx, $this->session->userdata ( 'session_id' ) )) {
			$this->word_model->update_referral ( $meaningidx );
			$this->word_model->insert_referral ( $meaningidx );
			echo 'success';
		} else
			echo 'fail';
	}
	
	public function search_word() {
		$word = $this->input->post('word');
		$this->load->model('word_model');
		$word_list = $this->word_model->get_word($word);
		
		$this->load->view('head');
		
		if ($word_list->num_rows () > 0) {
			$this->load->view ( 'word_list', array (
					'word_list' => $word_list->result () 
			) );
		}
		else {
			echo '검색 결과가 없습니다.';
		}

		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */