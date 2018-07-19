<?php 
class comments extends Model
{
	/*It saves comment data*/
	 public function message($data){
    	// print_r($data);die;
    	$blogId = $data['blog_id'];
    	$name = isset($data['name'])?$data['name']:'';
    	$email = isset($data['email'])?$data['email']:'';
    	$comment = isset($data['comment'])?$data['comment']:''; 
    	$query = "INSERT INTO message(name,email,comment,blog_id)VALUES('$name','$email','$comment','$blogId')";
    	// print_r($query);die;
    	$save = mysqli_query($this->db, $query);
    	}

    	public function getCommentsByBlogId($id){
    	if ($id){
        $query = "SELECT * FROM message WHERE blog_id=" .$id;
        $rawData = mysqli_query($this->db, $query);
			$data = [];
			if (($result = mysqli_query($this->db,$query)) && mysqli_num_rows($result) > 0){				
				while ($row = Mysqli_fetch_assoc($rawData)) {
					$data[] = $row;
					// print_r($data);die;
				}
		    }
			return $data;
		}	
    }		
}