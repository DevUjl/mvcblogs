<?php
	class BlogsController extends Controller
	{
		private $blogModel;

		public function __construct() {
			$this->blogModel = $this->model('blogs');
			$this->commentModel = $this->model('comments');
		}

		function index() {
			$blogs = $this->blogModel->get();
			$this->view('list_all_blogs', $blogs);
		}

		function create() {
			$storedData = [];
			if (isset($_GET['id'])) {
				$storedData = $this->blogModel->getBlogById($_GET['id']);
			}
             $this->view('addBlogs', $storedData);
		}
		function saveBlog() {
			$data = $_POST;
			//validate data for empty values
			
			$save = $this->blogModel->save($data);

			if ($save) {
				$message = "new blog created";
			} else {			
				$message = "couldn't create blog";
			}
			header("Location: /mvcblogs/public/blogs/index");
		} 
		function updateBlog(){
			$data = $_POST;
			$update = $this->blogModel->update($data);
			if($update){
				$message = 'blog is updated';
			}else{
				$message = "couldn't update the blog";
			}
			header("Location: /mvcblogs/public/blogs/index");
		}
		function delete(){
			if (isset($_GET['id'])) {
				$data = $_GET;
				$deleteData = $this->blogModel->getBlogById($_GET['id']);
				$delete = $this->blogModel->delete($data);
			}
			header("Location:/mvcblogs/public/blogs/index");
		}
		function detail() {
			//detailed view of one blog post
			if (isset($_GET['blog_id'])) {
				$id = $_GET['blog_id'];
				$blogs = $this->blogModel->getBlogById($id);
				$comments = $this->commentModel->getCommentsByBlogId($id);
                // print_r($comments);die;
                $blogsData = [
                	'blog' => $blogs,
                	'comments' => $comments
                ];
			}
			$this->view('display', $blogsData);
		}
		function comment() {
		    $id = $_GET['blog_id'];
			$data = $_POST;
			$send = $this->commentModel->message($data);
	   }
	}