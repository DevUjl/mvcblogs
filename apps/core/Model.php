<?php

	class Model 
	{
		protected $db;

		public function __construct(){
			$this->db = mysqli_connect("localhost","root","","mvcblog");
			if (!$this->db) {
				throw new Exception("Database connectionn is failed!");
			}
		}
		public function closedb(){
			mysqli_close();
		}
	}