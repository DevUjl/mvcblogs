<?php
class Config
{
	public function database(){
		if (!mysqli_connect("localhost","root","","mvcblog")) {
			throw new Exception("Database connectionn is failed!");
		}
	}
	public function closedb(){
		mysqli_close();
	}
}