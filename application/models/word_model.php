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
}

