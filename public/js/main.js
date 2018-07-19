$(document).ready(function () {
 //ajax for new articles 
  $('.blog-btn').on('click', function(e){
     e.preventDefault();
     if($('#titleid').val() == "") {
     	 alert('do not leave Title field empty!');
     } else if($('#categid').val() == "") {
     	    alert('do not leave categories field empty!');
       } else if($('#contentid').val() == "") {
       	    alert('do not leave content field empty!');
         }else{
     	/*-------this'll pass value through url method--------*/
         	// var title = $('#titleid').val();
          // // alert (title);
         	// var category = $('#categid').val();
         	// var content = $('#contentid').val();
         	// var data = {
  	       //   	  title: title,
  	       //   	  category:category,
  	       //   	  content: content,
  	       //`};
  /*yo sabai garnuko satto we can use SERIALIZE function*/
         	var data = $("form").serializeArray();
         	// $("#serialize").text(data);
         	var action;
         	if ($(this).hasClass("save_btn")) {
         		action = 'saveBlog';
         	} else {
         		action = 'updateBlog';
         		data['id'] = $('input[name=id]').val();
         	}

          $.ajax({
           type: "POST",
           url: "/mvcblogs/public/blogs/" +action,
           data: data,

           success: function(data){
           	$('#titleid').val('');
           	$('#categid').val('');
           	$('#contentid').val('');
           	if (action == 'saveBlog') {
           		msg = 'Blog saved successfully.';
           	} else {
           		msg = 'Blog updated successfully.';
           	}
           	$('#msg-container').text(msg);
           }
          });
     }
  });
 // ajax for Comment........  
  $('.msg-btn').on('click', function(e){
      e.preventDefault();
      if($('#name-id').val() == "") {
       alert('Name is required!');
     } else if($('#email-id').val() == "") {
          alert('E-mail is required!');
       } else if($('#comment-id').val() == "") {
            alert('Comment is required!');
         }else{
          // alert ("nothing");
          // var data = $("form").serializeArray();
          var name =  $('#name-id').val(),
              email = $('#email-id').val(),
              blogId = $('input[name=blog_id]').val(),
              comment = $('#comment-id').val();
          var data = {name: name, email: email, comment: comment, blog_id: blogId};
          var action;
          if($(this).hasClass("msg-btn")){
            action = "comment";
          }else{
            alert('Error Occured!');
          }
          $.ajax({
           type: "POST",
           url: "/mvcblogs/public/blogs/" +action,
           data: data,

           success: function(data){
            $('#name-id').val('');
            $('#email-id').val('');
            $('#comment-id').val('');
            if (action == 'comment') {
              msg = 'Comment is saved successfully.';
            } else {
              alert("Sorry comment is not sent!");
            }
            //$('#msg-container').text(msg);
            if ($('#comments-container').hasClass('hidden')) {
              $('#comments-container').removeClass('hidden');
            }
             var html = '<div class="display-comments"><strong>'+ name+'</strong><br><p class="user-email">'+ email+'</p><p class="user-comments">'+comment+'</p></div>';
             $('#comments-container').append(html);
           }
          })
         }     
  });

});

function displayFromDatabase(){
  $.ajax({
    url : "/mvcblogs/public/blogs/detail",
    type: "POST",
    success : function(displayFromDatabase){
      $(".display-comments").html(displayFromDatabase);
    }
  })
}