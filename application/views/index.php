 <div class="overlay"></div>
<div id="popup_box">
      <div class="popInner">
        <h2><strong>How to use</strong></h2>
          <p> Welcome to Dusup Wallpaper creation tool!</p>

          <p>To create a new wall paper please follow the below steps :</p>

            <p>1. Give your work a name you can identify with</p>
           <p> 2. The work date will be system generated</p>
           <p> 3. Active period 
               Here you can enter the start and end date till when you will be using this wallpaper</p>
           <p> 4. Choose category and template. Template will load in canvas.</p>
           <p> 5. You can add custom text, change the font color and style.</p>
           <p> 6. Once you are happy, click on Finalise.</p>
           <p> 7. The application will help you to create the wallpaper is different screen specifications you require in.</p>
           <p> 8. Download the wallpaper and use away!  </p>       
        </div>
      <a id="popupBoxClose"></a>  
    </div>
     <!-- Pop up box ends -->

<div class="page-inner">
                <div class="page-title">
                    <h3><strong>Works</strong></h3>
                    <div class="create_btn"><a class="btn btn-primary btn-addon m-b-sm btn-sm" href="<?php echo base_url();?>index.php/index/create_work" name="create" id="create">Create</a> <a class="btn btn-primary btn-addon m-b-sm btn-sm" href="javascript:void(0);" id="help" name="help">How to use</a>   </div>
                 
                </div>
               
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"></h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="work_area" class="display table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Work Name</th>
                                                <th>Image</th> 
                                                <th>Work Date</th>                                                                                              
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Generated Files</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if($works){ ?>
                                            
                                            <?php foreach($works as $work): ?>
                                              <tr id="work_row_<?php echo $work['work_id'] ?>">
                                                  <td><a href="<?php echo base_url(); ?>/index.php/index/edit_work/<?php echo $work['work_id']; ?>"><?php echo $work['work_name']; ?></a></td>
                                                   <td><img src="<?php echo base_url();?>uploads/thumb/<?php echo $work['thumb_file_name']; ?>"  /></td> 
                                                  <td><?php echo $work['work_date'] ?></td>
                                                 
                                                  <td><?php echo $work['start_date'] ?></td>
                                                   <td><?php echo $work['end_date'] ?></td>
                                                  <td> <?php  $CI =& get_instance(); $files =  $CI->getGeneratedfiles($work['work_id']); ?>
                                                   <?php foreach($files as $file): ?>
                                                   <p><?php echo $file['image_name']; ?><a href="<?php echo base_url(); ?>index.php/index/downloadFile/<?php echo $file['image_name']; ?>">   <i class="fa fa-arrow-down"></i></a></p>
                                                   <?php endforeach; ?>
                                                  </td>
                                                   <td><td><a href="javascript:void(0)" onClick="delete_confirm(<?php echo $work['work_id'] ?>)" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove">Delete</i></a></td></td>
                                              </tr>    
                                            <?php endforeach; ?>
                                            
                                         <?php } 
										 									 
										 else { ?>                                         
                                            <tr>
                                               <td colspan="5">No Works Found</td>
                                            </tr>   
                                         <?php } ?>
                                          
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div><!-- Row -->
                </div>
<script>
 
 $(document).ready(function(){
	
	$('#help').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box').show();
	});
	
	$('#popupBoxClose,.overlay').click(function(){
	  $('#popup_box').hide();
      $('.overlay').removeClass('show');
   });
   
   var $table= $("#work_area").dataTable({
						aLengthMenu: [
							[25, 50, 100, -1],
							[25, 50, 100, "All"]
						],
						iDisplayLength: 10
			});      	 
	 
 });

function delete_confirm(work_id){
  
  swal({   title: "Are you sure?",   text: "Do you want to delete the work!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){ delete_work(work_id);   });

}

  function delete_work(work_id){ 
        $.ajax({   
				 type:'POST',
				 dataType:'json',
				 data:'work_id='+work_id,
				 url:'<?php echo base_url();?>'+'index.php/custom_ajax/delete_work',
				 success: function(data){
					if(data.status=="success"){
					      $('#work_row_'+work_id).fadeOut(100); 
						  swal("Deleted!", "Work has been deleted.", "success");
						  							  
					}											
				}
		});
} 

</script>                