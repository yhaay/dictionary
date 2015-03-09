<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Word_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function get_by_choseong($choseong) {
		$this->db->select ( 'word.wordidx as wordidx,word,meaning,referral' );
		$this->db->order_by ( 'word', 'asc' );
		$this->db->group_by ( 'word.wordidx' );
		$this->db->from ( 'word' );
		$this->db->where ( 'choseong', $choseong );
		$this->db->join ( '(select * from meaning order by referral desc) as meaning', 'meaning.wordidx=word.wordidx', 'left' );
		return $this->db->get ();
	}
	function get_meaning_by_wordidx($wordidx) {
		$this->db->select ( 'meaningidx,meaning,referral' );
		$this->db->from ( 'meaning' );
		$this->db->order_by ( 'referral', 'desc' );
		$this->db->where ( 'wordidx', $wordidx );
		return $this->db->get ();
	}
	function get_word_by_wordidx($wordidx) {
		$this->db->select ( 'word,wordidx' );
		$this->db->from ( 'word' );
		$this->db->where ( 'wordidx', $wordidx );
		return $this->db->get ();
	}
	function update_referral($meaningidx) {
		$this->db->where ( 'meaningidx', $meaningidx );
		$this->db->set ( 'referral', 'referral+1', false );
		$this->db->update ( 'meaning' );
		return;
	}
	function insert_referral($meaningidx) {
		$this->db->set('meaningidx', $meaningidx);
		$this->db->set('session_id', $this->session->userdata('session_id'));
		$this->db->set('writedate','now()',false);
		$this->db->insert('referral');
		return;
	}
	
	function check_session_id($table, $idxname, $idx, $session_id) {
		$this->db->where('session_id', $session_id);
		$this->db->where($idxname, $idx);
		$this->db->from($table);
		$num = $this->db->count_all_results();
		if ($num>0)
			return false;
		else 
			return true;
	}
	
	function get_word($word){
		$word = preg_replace("/\s+/", "", $word);
		$this->db->select ( 'word.wordidx as wordidx,word,meaning,referral' );
		$this->db->order_by ( 'word', 'asc' );
		$this->db->group_by ( 'word.wordidx' );
		$this->db->from ( 'word' );
		$this->db->like("replace(word,' ','')", $word);
		$this->db->join ( '(select * from meaning order by referral desc) as meaning', 'meaning.wordidx=word.wordidx', 'left' );
		return $this->db->get ();
	}
}

