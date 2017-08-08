<div class="page-inner">
    <div id="page-loader" class="fade"><span class="spinner"></span></div>
    <!-- Pop up box starts -->
    <div class="overlay"></div>
    <div id="popup_box">
      <div class="popInner">
        <h2>Add Text</h2>
          <div>
                 <input type="text" class="form-control" id="image_pop_text" name="image_pop_text" />
          </div>
          <br />
          <br />
           <div class="form-group">
               <div>
                       <a  class="btn btn-success" id="add_text_btn">Add</a>
               </div>
          </div> 
        </div>
      <a id="popupBoxClose"></a>  
    </div>
    
    <div id="popup_box_upload">
      <div class="popInner">
        <h2>Add Image</h2>
          <div class="form-group">
                    <label for="input-placeholder" class="col-sm-2 control-label">Upload</label>
                    <div class="col-sm-10">
                        <input name="thumb_file" id="thumbuserfile" type="file" />
                       <button  id="upload_thumb_btn" name="upload_thumb_btn" class="btn btn-success">Upload</button>
                    </div>
         </div>          
        </div>
      <a id="popupBoxCloseUpload"></a>  
    </div>
     <!-- Pop up box ends -->
                   
              <div class="page-title">
                    <h3><strong>Edit Work</strong></h3>
                      <div class="create_btn"><!--<a class="btn btn-primary btn-addon m-b-sm btn-sm" href="javascript:void(0)" name="create" id="create">Save</a>--> <a  class="btn btn-danger btn-sm discard_btn" href="<?php echo base_url();?>">Discard</a></div>
                </div>
                
                <div id="main-wrapper">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Edit</h4>
                                </div>
                                <div class="panel-body">
                                  <?php if($work){ ?>
                                    <?php foreach($work as $wrk): ?>
                                     <form class="form-horizontal" name="edit_work" id="edit_work" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Work Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="work_name" name="work_name" value="<?php echo $wrk['work_name'] ?>">
                                                <input type="hidden"  id="work_id" name="work_id" value="<?php echo $wrk['work_id'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Work Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control date-picker" id="work_date" name="work_date" value="<?php echo $wrk['work_date'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="work_start_date" name="work_start_date" value="<?php echo $wrk['start_date'] ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="work_end_date" name="work_end_date" value="<?php echo $wrk['end_date'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-placeholder" class="col-sm-2 control-label">Upload</label>
                                            <div class="col-sm-10">
                                                <input name="file" id="userfile" type="file" />
                                                <label class="control-label"><small>(Minimum Image resolution should be 1920X1200)</small></label>
                                                <br />
                                                <label class="control-label"><small>(Image format should be .jpg or .png)</small></label>
                                                <br/>
                                                 <br/>
                                               <button  id="upload_btn" name="upload_btn" class="btn btn-success">Upload</button>
                                               <input type="hidden" name="uploaded_file_name" id="uploaded_file_name" />
                                               <input type="hidden" name="temp_uploaded_file_name" id="temp_uploaded_file_name" />
                                               <input type="hidden" name="svg_file_name" id="svg_file_name" value="<?php echo $wrk['svg_file_name'] ?>" />
                                               <input type="hidden" name="thumb_file_name" id="thumb_file_name" />
                                            </div>
                                            <!--<div style="width:500px;height:500px;" id="uploaded_file"></div>-->
                                        </div> 
                                        
                                        
                                        
                                        
                                        
                                        <div class="row well well-sm toolArea">
                                        	<div class="col-md-9 ">
                                            	<div class="canvasNewContainer">
                                                    <span class="cropTop" style="display:none"></span>
                                                	<span class="cropBottom"></span>
                                                	<span class="screenlock"></span>
                                            		<canvas id="canvas" width="800" height="500" style="border:1px soild red;"></canvas>
                                                </div>
                                                <br clear="all"/>
                                            </div>
                                        	<div class="col-md-3">
                                            
                                            
                                            <div class="toolOne">                                            
                                            		<div class="form-group">
                                                     <a  id="add_text" name="add_text" class="btn btn-success">Add Text</a>
                                                   </div> 
                                                    <div class="form-group">
                                                     <a  id="add_image" name="add_image" class="btn btn-success">Add Image</a><br/>
                                                     <div id="image_select_text" style="display:none;">
                                                     <br/>
                                                      <input type="text" id="image_text" name="image_text" class="form-control" />
                                                     </div>
                                                   </div>  
                                                   <div class="form-group" id="remove_element" style="display:none;">
                                                     <a  id="remove_element" name="remove_element" class="btn btn-success">Remove</a>
                                                   </div> 
                                                     <div class="form-group">
                                                     	<label class="control-label">Change Font Color</label> 
                                                       <div id="colorSelector"><div id="selectorSubdiv" style="background-color: #0000ff"></div></div>
                                                     </div> 
                                                     
                                                     <div class="form-group">
                                                     	
                                                     	<label class="control-label">Change Font Size</label><br/>
                                                        <div class="col-md-3" style="padding:0">
                                                         <select name="font-size" id="font-size" class="form-control col-md-3">
                                                           <option name="-1">Select</option>
                                                           <?php for($i=8;$i<=150;$i++){ ?>
                                                           <option name="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                           <?php } ?> 
                                                         </select>
                                                       </div>  
                                                    </div> 
                                                    
                                                    <div class="form-group">                                            
                                                        <div class="dropdown">
                                                            <label class="control-label">Change Font Style</label> <br/>
                                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Font Style
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu fontStyle" aria-labelledby="dropdownMenu1">
                                                                <li><a href="javascript:void(0);" rel="bold"><b>BOLD</b></a></li>
                                                                <li><a href="javascript:void(0);" rel="italic"><i>ITALIC</i></a></li>
                                                                <li><a href="javascript:void(0);" rel="underline"><u>UNDERLINE</u></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group">                                            
                                                        <label class="control-label">Change Font Family</label><br/>
                                                        <div class="col-md-5" style="padding:0">
                                                         <select name="font-family" id="font-family" class="form-control col-md-5">
                                                           <option name="-1">Select</option>
                                                           <?php foreach($fontfamilyList as $fontfamily): ?>
                                                             <option value="<?php echo $fontfamily['font_family']; ?>"><?php echo $fontfamily['font_family']; ?></option>
                                                           <?php endforeach; ?>
                                                         </select>
                                                        </div> 
                                                    </div>
                                                    
                                                    <div class="form-group">                                            
                                                        <label class="control-label">Crop from</label><br/>
                                                        <div class="col-md-5" style="padding:0">
                                                         <select name="crop_from" id="crop_from" class="form-control col-md-3">
                                                           <option value="top">Top</option>
                                                           <option value="bottom">Bottom</option>
                                                         </select>
                                                        </div> 
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                     <a  id="save_image" name="save_image" class="btn btn-success">Save Image</a>
                                                    </div>  
                                                    
                                         </div>
                                            
                                                <div class="form-group resolutionSet" >
                                                        
                                                           <a  id="edit_image" name="edit_image" class="btn btn-success">Edit Image</a>
                                                          
                                                           <br />
                                            
                                                        <label class="control-label">Choose Required Resolutions</label>
                                                        <div class="">
                                                            <div class="checkbox">
                                                                <label>
                                                                     <input type="checkbox" id="resolution1" name="resolution1" value="1024X576">1024X576 
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="resolution2" name="resolution2" value="1280X720">1280X720
                                                                </label>
                                                            </div>
                                                             <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="resolution3" name="resolution3" value="1366X768" >1366X768 
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="resolution4" name="resolution4" value="1920X1080">1920X1080
                                                                </label>
                                                            </div>
                                                           
                                                            
                                                        </div><br/>
                                                        <a  id="generate_image" name="generate_image" class="btn btn-success">Finalise</a>
                                                    </div>                                    
                                            
                                            </div>
                                        </div>
                                      <?php endforeach; ?>
                                      <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div>
                
                
<script>
var canvas = new fabric.Canvas('canvas');
$(document).ready(function(){	
    
	//render canvas
	var svg_file_name = $('#svg_file_name').val();
	$('.toolArea').show();
	fabric.loadSVGFromURL('<?php echo base_url();?>uploads/svg/'+svg_file_name+'', function(objects, options) {
    var obj = fabric.util.groupSVGElements(objects, options);
    var arr_len = obj.paths.length;
    var i=0;
    for(i=0;i<arr_len;i++){    
	var new_obj = obj.paths[i]
	
	if(i==0){
	  var background_image = new_obj._originalElement.currentSrc;
	  canvas.setBackgroundImage(background_image, canvas.renderAll.bind(canvas),{width:800,height:500});	
	}
	else{
	  
	  if(new_obj.type=='text'){
		 console.log(new_obj); 
		var tbText = new fabric.Text(""+new_obj.text+"", {
			top: new_obj.top,
			left: new_obj.left,
			fill: new_obj.fill,
			lockScalingX:true,
			lockScalingY:true,
			fontFamily:new_obj.fontFamily,
			fontWeight:new_obj.fontWeight,
			fontSize:new_obj.fontSize,	  
		 });
		 tbText.set({left: new_obj.left,top: new_obj.top});
		 canvas.add(tbText);
		 canvas.renderAll(); 
		  
	  }
	  else{
		  
		   var image = new_obj._originalElement.currentSrc; 
		  
		   fabric.Image.fromURL(image, function(myImg) {
					var img1 = myImg.set({ left: -new_obj.left, top: -new_obj.top});
					canvas.add(img1); 
		   });
		  
	  }
	 	
	
	}
	
		  
  }
  //canvas.add(obj).renderAll();
});
	
	
	//Upload Main Image
	
	$('#upload_btn').click(function(e){
		e.preventDefault();	
		var file, img;
		var file_data = $('#userfile').prop('files')[0];
		var ext = $('#userfile').val().split('.').pop().toLowerCase();
		var file_name=$('#userfile').val();
		if(file_name==''){
		  toastr.error('Please Select a file'); 
	      return false;
		}
		if(ext!='jpg' && ext!='png') {
			 toastr.error('Invalid file'); 
			 return false;
		}
		$('#page-loader').addClass('in');    
		var form_data = new FormData();                  
		form_data.append('file', file_data);                      
		$.ajax({
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/upload_image', 
					dataType: 'json', 
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
						  	 $('#uploaded_file_name').val(data.image);
							 setDefaults();
                             canvas.setBackgroundImage('<?php echo base_url();?>uploads/images/'+data.image+'', canvas.renderAll.bind(canvas),{width:800,height:500});
							 canvas.renderAll();
							 $('.toolArea').show();
						     $('#page-loader').removeClass('in');
						}
						else if(data.status=='size_error'){
						  
						   $('#page-loader').removeClass('in');	
						   toastr.error('Image Resolution should be 1920X1200'); 	
						}
					},
					 error: function(jqXHR, textStatus, errorThrown) {
							   $('#page-loader').removeClass('in');	
                               toastr.error('Some error occured'); 	
                          }
		 });
   }); 
   
   //popup event  
  		
   $('#add_text').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box').show();
	});
	
   $('#add_image').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box_upload').show();
	});
	
	$('#popupBoxClose,.overlay').click(function(){
	  $('#popup_box').hide();
      $('.overlay').removeClass('show');
	  $('#image_pop_text').val('');	  
   });
   
   $('#popupBoxCloseUpload,.overlay').click(function(){
	  $('#popup_box_upload').hide();
      $('.overlay').removeClass('show');
	  	  
   });
   
   
   $('#crop_from').click(function(){
	   var val = $(this).val();
	   if(val=='top'){
		  $('.cropBottom').show();
		  $('.cropTop').hide();
	   }
	   else{
		  $('.cropBottom').hide()
	      $('.cropTop').show()  
	   }
   });
   
   //remove element
   $('#remove_element').click(function(){
		 
		 var activeObject = canvas.getActiveObject();
		 activeObject.remove();
		 		
	});
	
	//Edit fontstyle
	$('.fontStyle li a').click(function(){
		
		var type = $(this).attr('rel');
		var parentClass = $(this).parent().attr('class');
		if(parentClass=='active')
		  $(this).parent().removeClass('active');
		else
		  $(this).parent().addClass('active');   
		var activeObject = canvas.getActiveObject();
		if(type=='bold'){	  		 
          if (activeObject && activeObject.type == 'text') {
			      if(parentClass=='active')
                    activeObject.set('fontWeight','normal');
				  else
				    activeObject.set('fontWeight','bold');	
                  canvas.renderAll();
          }		
			
		}
	   else if(type=='italic'){
		 
		 if (activeObject && activeObject.type == 'text') {
			      if(parentClass=='active')
                    activeObject.set('fontStyle','normal');
				  else
				    activeObject.set('fontStyle','italic');	
                  canvas.renderAll();
          }		
		   
	   }
	  else if(type=='underline'){
		 
		 if (activeObject && activeObject.type == 'text') {
			      if(parentClass=='active')
                     activeObject.set('textDecoration','normal');
				  else 
				     activeObject.set('textDecoration','underline');	 
                  canvas.renderAll();
          }		
		   
	   } 
		
		
	});
	
	//Reedtit Image
	$('#edit_image').click(function(){
	  
	    $('.toolOne').show();
		$('.resolutionSet').hide();
		$('.screenlock').removeClass('show');
		$('#upload_btn').attr('disabled',false);	
		
	});
	
	//Edit text on canvas
	
	$('#add_text_btn').click(function(){	  
	  var image_text = $('#image_pop_text').val();
	  if(image_text!=''){
		  var tbText = new fabric.Text(""+image_text+"", {
			top: 250,
			left: 380,
			fill: "#fff",
			lockScalingX:true,
			lockScalingY:true	  
		 });
		 canvas.add(tbText);
		  $('#popup_box').hide();
		  $('.overlay').removeClass('show');
		  $('#image_pop_text').val('');	   
	  }	  
	   
   });
   
   //get selected changes	
   canvas.on("object:selected",function(){					
	  var obj = canvas.getActiveObject();	 
	  if(obj.type=='text'){
	   $('#font-size').val(obj.get('fontSize'));
	   $('#selectorSubdiv').css("background-color",obj.fill)
	   $('#image_select_text').show();	  	
	   $('#image_text').val(obj.text);	
	   $('#font-family').val(obj.get('fontFamily'));   
	  }
	  else{
	      $('#image_select_text').show();		  
	  }
	  $('#remove_element').show();
	});	
	
	$('#image_text').keyup(function(){
     var edited_text = $(this).val().trim();
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type == 'text') {
       activeObject.set('text',edited_text);
       canvas.renderAll();
      }
    });
	
   //Change color
   $('#colorSelector').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(100);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(100);
				return false;
			},
			onChange: function (hsb, hex, rgb) {			
				var color = '#'+hex;
				$('#selectorSubdiv').css("background-color",color)
               var activeObject = canvas.getActiveObject();
               if (activeObject && activeObject.type == 'text') {
                  activeObject.set('fill',color);
                  canvas.renderAll();
               }	
				
			}
		});
   
   //Change font size
   
   $('#font-size').change(function(){	  
	  var font = $(this).val();
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type == 'text') {
       activeObject.set('fontSize',font);
       canvas.renderAll();
      }	   
	   
   });
   
    //Change font family
   $('#font-family').change(function(){
	var font = $(this).val();
	if(font!=-1){
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type == 'text') {
       activeObject.set('fontFamily',font);
       canvas.renderAll();
      }	
	}
	
	
   });
	
	/*$('#save_image').click(function(){
		var data = canvas.toDataURL({format: 'png', quality: 0.8})
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:''+'index.php/custom_ajax/generate_image', 
					dataType: 'json',  
					data: 'image_data='+data,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							$('.toolOne').hide();
							$('.resolutionSet').show();
							$('.screenlock').addClass('show');
							$('#page-loader').removeClass('in');
						  	$('#temp_uploaded_file_name').val(data.image);
							$('#upload_btn').attr('disabled','disabled');
	                        toastr.success('Image has been successfully saved');
						}
					}
		 });
         
		
	});*/
	
	//Convert image from svg 
	
	$('#save_image').click(function(){
		var canvas_data  = canvas.toSVG({viewBox:{x:0,y:0,width:800,height:500}});
		console.log(canvas_data);
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/generate_image', 
					dataType: 'json',  
					data: 'canvas_data='+canvas_data,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							$('.toolOne').hide();
							$('.resolutionSet').show();
							$('.screenlock').addClass('show');
							$('#page-loader').removeClass('in');
						  	$('#temp_uploaded_file_name').val(data.image);
							$('#svg_file_name').val(data.svg_name);
							$('#thumb_file_name').val(data.thumb_image_name);
							$('#upload_btn').attr('disabled','disabled');
	                        toastr.success('Image has been successfully saved');
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
							   $('#page-loader').removeClass('in');	
                               toastr.error('Some error occured'); 	
                     }
		 });
         
		
	});
	
    //Generate image with different resolutions
	
	$('#generate_image').click(function(){
		var file_name=$('#temp_uploaded_file_name').val();
		var name = $('#work_name').val();
		var work_date = $('#work_date').val();
		var start_date = $('#work_start_date').val();
		var end_date = $('#work_end_date').val();
	    var file = $('#uploaded_file_name').val();
		var work_id = $('#work_id').val();
		var svg_file_name= $('#svg_file_name').val();
		if(name==''){
			   
			   setTimeout(function() {
									toastr.options = {
										closeButton: true,
										progressBar: true,
										showMethod: 'slideDown',
										timeOut: 4000
									};
                                    toastr.error('Complete the fields');
                               }, 1300);		
		      return false;
			   
		}
		
		selected = new Array();
		$('.resolutionSet input:checked').each(function() {
          selected.push($(this).attr('value'));         
        });
		if(selected.length==0){
			
			 setTimeout(function() {
									toastr.options = {
										closeButton: true,
										progressBar: true,
										showMethod: 'slideDown',
										timeOut: 4000
									};
                                    toastr.error('Please select resolutions to generate');
                               }, 1300);		
		      return false;
			
		}
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/generate_resolution_image', 
					dataType: 'json',  
					data: 'selected_images='+selected+'&image='+file_name+'&work_name='+name+'&uploaded_file_name='+file+'&work_date='+work_date+'&svg_file_name='+svg_file_name+'&type=create&start_date='+start_date+'&end_date='+end_date+'&thumb_file_name='+thumb_file_name+'&crop_from='+crop_from,                      
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							window.location.href = "<?php echo base_url();?>";			
						}
					}
		 });
		
		
	});
	
	
  
   
    $('#upload_thumb_btn').click(function(e){
		e.preventDefault();	
		var file_data = $('#thumbuserfile').prop('files')[0];
		var ext = $('#thumbuserfile').val().split('.').pop().toLowerCase();
		var file_name=$('#thumbuserfile').val();
		if(file_name==''){
		  toastr.error('Please Select a file'); 
	      return false;
		}
		if(ext!='jpg' && ext!='png') {
			 toastr.error('Invalid file'); 
			 return false;
		 }
		$('#page-loader').addClass('in');    
		var form_data = new FormData();                  
		form_data.append('file', file_data);                      
		$.ajax({
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/upload_thumb_image', // point to server-side PHP script 
					dataType: 'json',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							$('.overlay').removeClass('show');
		                    $('#popup_box_upload').hide();
						    $('#page-loader').removeClass('in');
							fabric.Image.fromURL('<?php echo base_url();?>uploads/thumb_images/'+data.image+'', function(myImg) {
								 var img1 = myImg.set({ left: 0, top: 0});
								 canvas.add(img1); 
								});
						   
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
							   $('#page-loader').removeClass('in');	
                               toastr.error('Some error occured'); 	
                          }
		 });
   });
  
  $('#create').click(function(){
	   
	   $('#create_work').trigger('submit');	
		
	});
 $('#create_work').submit(function(e){
	        e.preventDefault();
			var name = $('#work_name').val();
			var file = $('#uploaded_file_name').val();
			if(name=='' || file==''){
			   
			   setTimeout(function() {
									toastr.options = {
										closeButton: true,
										progressBar: true,
										showMethod: 'slideDown',
										timeOut: 4000
									};
                                    toastr.error('Complete the fields');
                               }, 1300);		
		      return false;
			   
			}
			$('.loadings').show();
			dataString = $('form[name=create_work]').serialize();
			$.ajax({
					type:'POST',
					data:dataString,
					dataType:'json',
					url:'<?php echo base_url();?>'+'index.php/custom_ajax/create_work',
					success:function(data) {
						  if (data.status=='success'){
							window.location.href = "<?php echo base_url();?>index.php/index/works";			    				  
						  }
						  else{							        	  
							    $('.loadings').hide();		
						  }
					},
					error: function(jqXHR, textStatus, errorThrown) {
							   $('#page-loader').removeClass('in');	
                               toastr.error('Some error occured'); 	
                    }
				  });
				
	  }); 
   
 
});
function setDefaults() {
	canvas.selection = false;
	canvas.hoverCursor = "pointer";
	canvas.moveCursor = "pointer";
}

</script>