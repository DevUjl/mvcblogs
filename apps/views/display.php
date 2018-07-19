<!--full blog contents-->
<div class="detail_view">
	<?php foreach($data['blog'] as $row):?>
		<strong><?php echo $row['title'];?></strong><br>
		<?php echo $row['category'];?>
		<?php echo "<br>";?>
		<?php echo $row['content'];?>
	<?php endforeach;?>
</div>

<!--displaying comments-->
 
<div id="comments-container" class="<?php echo (!empty($data['comments']))? '' :'hidden' ?>">
<h1>comments:</h1>
	<?php if (isset($data['comments']) && !empty($data['comments'])): ?>
		<?php foreach ($data['comments'] as $row):?>
		<div class="display-comments">
				<strong><?php echo $row['name'];?></strong>
				<?php echo "<br>";?>
				<p class="user-email"><?php echo $row['email'];?></p>
				<?php echo "<br>";?>
				<p class="user-comments"><?php echo $row['comment'];?></p>	
		</div>
		<?php endforeach;?>
	<?php endif; ?>
</div>

<!--comment section-->
<div class="msg-box">
	 <div id="msg-container"></div>
	<div class="msg-title-bar">
		<p>Comment about the posts below</p>
	</div>
	<form method="POST" action="/mvcblogs/public/blogs/comment">
		<?php if(isset($_GET['blog_id'])){ ?>
            <input type="hidden" name="blog_id" value="<?php echo $_GET['blog_id'] ?>">
        <?php } ?>
	 	<label>Full Name</label>
	 	<input type="text" name="name" id="name-id"><br>

	 	<label>E-mail</label>
	 	<input type="text" name="email" id="email-id"><br>

	 	<label>Comment</label>
	 	<textarea name="comment" id="comment-id"></textarea>

	 	<button type="submit" name="submit" class="msg-btn">Send</button>
	</form>
</div>