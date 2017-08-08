<div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <div class="user-box m-t-lg row">
                                    <div class="col-md-12 m-b-md">
                                        <img  src="<?php echo $this->config->item('assets_url')?>images/logo.png" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <p class="lead no-m text-center" id="primaryText">Sign in to continue!</p>
                                        <p class="text-sm text-center" id="secondaryText">Enter your credentials to login</p>
                                       <form class="m-t-md" name="loginForm" id="loginform" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block" id="submitLogin">Login</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
<script>
	$(document).ready(function(){
	   $("#username,#password").keyup(function(event){
          if(event.keyCode == 13){
            $("#loginform").submit();
          }
       }); 
	  $('#loginform').submit(function(e){
		   e.preventDefault();
		   var username = $('#username').val();
		   var password = $('#password').val();
		   if(username=='')
		     toastr.error('Enter username'); 
		   else if(password=='')
		     toastr.error('Enter password'); 
		   $('#page-loader').removeClass('hide');
		   $('#submitLogin').attr('disabled','disabled');	 
		   dataString = $('form[name=loginForm]').serialize();
		   $.ajax({
					type:'POST',
					data:dataString,
					dataType:'json',
					url:'<?php echo base_url();?>'+'index.php/custom_ajax/verifylogin',
					success:function(data) {
						  if (data.status=='success'){
							 window.location.href = "<?php echo base_url();?>"; 			    				  
						  }
						  else{	
						        $('#page-loader').addClass('hide');						        	  
							    setTimeout(function() {
									toastr.options = {
										closeButton: true,
										progressBar: true,
										showMethod: 'slideDown',
										timeOut: 4000
									};
                                    toastr.error('Invalid Credentials');

                               }, 1300);
							   
							    $('#submitLogin').attr('disabled',false);				
						  }
					}
				  });	 	 		   
		     
	  });
	});

</script>	