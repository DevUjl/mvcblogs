     <div id="msgs">
          <p>Create new blog</p>
     </div>
     <?php 
          $title = (!empty($data)) ? $data[0]['title'] : '';
          $category = (!empty($data)) ? $data[0]['category']: '';
          $content = (!empty($data)) ? $data[0]['content']: '';
     ?>
     <div id = "add-form-div">
          <div id="msg-container"></div>
          <form action="<?php echo (!isset($data[0]['id']))? "/mvcblogs/public/blogs/    saveBlog":"/mvcblogs/public/blogs/updateBlog"?>" method="POST">

               <?php if(!empty($data)): ?>
               <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
               <?php endif; ?>

          	<label name = "text-label">Title</label>
          	<input id="titleid" class="text-input" type="text" name="title" value=" <?php  echo $title?>"><br>

          	<label name = "text-label">Category</label>
          	<input id="categid" class="text-input" type="text" name="category" value="<?php echo $category?>"><br>

          	<label name = "text-label">Content</label>
          	<input id="contentid" class="text-input" type="text" name="content" value="<?php echo $content?>"><br>

               <?php 
                    $buttonLabel = (isset($data[0]['id']))? 'Update' : 'Save';
                    $buttonClass = (isset($data[0]['id']))? 'update_btn' : 'save_btn';
                ?>
          	<button class='<?php echo $buttonClass ?> blog-btn'><?php echo $buttonLabel ?></button>    
          </form> 
          <data id="serialize"></data>
     </div>

