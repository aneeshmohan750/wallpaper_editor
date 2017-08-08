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
                                        <p class="lead no-m text-center" id="primaryText">Change Password</p>
                                       <form class="m-t-md" name="changepasswordForm" id="changepasswordForm" method="POST">
                                              <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
                                            <div class="form-group">
                                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                                            </div>
                                             <div class="form-group">
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block" id="changepasswordbtn">Login</button>
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
	   $("#current_password,#new_password,confirm_password").keyup(function(event){
          if(event.keyCode == 13){
            $("#changepasswordForm").submit();
          }
       });
	    
	   $('#changepasswordForm').submit(function(e){
	        e.preventDefault();
			var password = $('#current_password').val();
			var new_password = $('#new_password').val();
			var confirm_password = $('#confirm_password').val();
			if(password=='' || new_password =='' || confirm_password==''){
			  toastr.error('Please enter the fields');
		      return false;
			}
			else if(new_password!=confirm_password){
			    toastr.error('Password Mismatch');
		        return false;					
			}
			$('#changepasswordbtn').attr("disabled","disabled");
			dataString = $('form[name=changepasswordForm]').serialize();
			$.ajax({
					type:'POST',
					data:dataString,
					dataType:'json',
					url:'<?php echo base_url();?>'+'index.php/custom_ajax/change_password',
					success:function(data) {
						  if (data.status=='success'){
							window.location.href = "<?php echo base_url();?>index.php/index/logout";			    				  
						  }
						  else{							        	  
							  toastr.error('Current Password Entered is Wrong');
							  $('#changepasswordbtn').attr("enabled","enabled");
						  }
					}
				  });
				
	  });
	});
</script>
  