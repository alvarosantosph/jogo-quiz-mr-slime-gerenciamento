<?php 
ini_set('display_errors', 0);
require_once('polargames.class.php');

class Ranking extends PolarGames{
	public function __construct(){
		parent::__construct('ranking');
	}
}