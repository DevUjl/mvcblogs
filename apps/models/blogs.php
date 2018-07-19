<?php

class blogs extends Model
{

	public function save($data){
		
		$title = isset($data['title'])?$data['title']:'';
		$category = isset($data['category'])?$data['category']:'';
		$content = isset($data['content'])?$data['content']:'';
    	$query = "INSERT INTO blogs(title,category,content) VALUES('$title','$category','      $content')";
    	$save = mysqli_query($this->db, $query);
    	
    	if ($save) {
    		return true;
    	} 
    	return false;
	}

	public function get() {
		$query = "SELECT * FROM blogs";
		$rawData = mysqli_query($this->db, $query);
		$data = [];
		while ($row = Mysqli_fetch_assoc($rawData)) {
			  $data[] = $row;
		}
		return $data;
	}

	public function getBlogById($id) {
		if ($id){
			$query = "SELECT * FROM blogs WHERE id = $id";
			$rawData = mysqli_query($this->db, $query);
			$data = [];
			while ($row = Mysqli_fetch_assoc($rawData)) {
				$data[] = $row;
			}
			return $data;	
		}
	}

	public function update($data){
        $title = isset($data['title']) ? $data['title']:'';
		$category = isset($data['category'])?$data['category']:'';
		$content = isset($data['content'])?$data['content']:'';
		$id = $data['id'];
		$update = mysqli_query($this->db,"UPDATE blogs SET category='$category',
		          title ='$title', content ='$content'WHERE id = $id");
	    if($update){
	    	return true;
	    }else{
	    	return false;
	    }
	}
	public function delete($data){
		$id = $data['id'];
		$delete = mysqli_query($this->db,"DELETE FROM blogs WHERE id = $id");
		
	}

/*to save comment section data*/
    // public function message($data){
    // 	// print_r($data);die;
    // 	$blogId = $data['blog_id'];
    // 	$name = isset($data['name'])?$data['name']:'';
    // 	$email = isset($data['email'])?$data['email']:'';
    // 	$comment = isset($data['comment'])?$data['comment']:''; 
    // 	$query = "INSERT INTO message(name,email,comment,blog_id)VALUES('$name','$email','$comment','$blogId')";
    // 	// print_r($query);die;
    // 	$save = mysqli_query($this->db, $query);
    // 	}
  //   public function getCommentsByBlogId($id){
  //   	if ($id){
  //       $query = "SELECT * FROM message WHERE blog_id=" .$id;
  //       $rawData = mysqli_query($this->db, $query);
		// 	$data = [];
		// 	if (($result = mysqli_query($this->db,$query)) && mysqli_num_rows($result) > 0){				
		// 		while ($row = Mysqli_fetch_assoc($rawData)) {
		// 			$data[] = $row;
		// 			// print_r($data);die;
		// 		}
		//     }
		// 	return $data;
		// }	
  //   }		
}