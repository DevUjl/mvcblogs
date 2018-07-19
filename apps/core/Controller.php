<?php
   /**
    * 
    */
   class Controller 
   {
   	
     public function model($model){
     	require_once'../apps/models/'.$model.'.php';
     	return new $model;
     }

     public function view($view, $data = []){
        require_once '../apps/views/common/header.php';
        require_once '../apps/views/'.$view.'.php';
        require_once '../apps/views/common/footer.php';
        // require_once '../apps/public/css/style.css';
     }
   }

?>