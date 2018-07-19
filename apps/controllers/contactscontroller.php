<?php
 
     class ContactsController extends Controller
     {

     	function addContact($name=''){
     		// echo "Testing from contacts->controller and addContact->method ";
     		$user = $this->model("Users");
     		$user->name = $name;
     		//echo $user->name;
     		$this->view('contacts', ["name"=> $user->name]);
     	}

        function good($val=''){
        	$this->view('contacts_good', ['name' => $val]);
        }	
     }   