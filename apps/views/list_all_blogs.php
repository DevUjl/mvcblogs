<div>
	<?php ?>
	<form>
		<table class="table-style">
				<thead>
					<tr>
						<th>Category</th>
						<th>Title</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach($data as $row):?>
						<tr>
							<td>
								<?php echo $row['category'];?>		
							</td>
							<td>
								<?php echo $row['title'];?>
							</td>
							
							<td>
								<a class="edit_btn" href="/mvcblogs/public/blogs/create?id=<?php echo $row['id']?>">Edit</a> 
							</td>
						   
							<td>
								<a class="del_btn" href="/mvcblogs/public/blogs/delete?id=<?php echo $row['id']?>">Delete</a>
							</td>
							<td>
								<a class = "det_blog" href="/mvcblogs/public/blogs/detail?blog_id=<?php echo $row['id']?>">Details</a>
							</td>
						</tr>
				    <?php endforeach;?>
				</tbody>	
		</table>
	</form>
</div>