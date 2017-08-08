// JavaScript Document
var canvas = new fabric.Canvas('canvas');
var baseurl = document.getElementById('baseurl').value;
$(document).ready(function(){	 	
	$('#add_text').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box').show();
	});
	
	$('#add_image').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box_upload').show();
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
	
	$('#remove_element').click(function(){
		 
		 var activeObject = canvas.getActiveObject();
		 
		 activeObject.remove();
		 		
	});
	
	$('#save_image').click(function(){
		var data  = canvas.toSVG({viewBox:{x:0,y:0,width:800,height:500}});
		console.log(data);
		var file_name = $('#uploaded_file_name').val();
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:baseurl+'index.php/custom_ajax/generate_image', 
					dataType: 'json',  
					data: 'image_data='+data+'&file_name='+file_name,                         
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
					},
					error: function(jqXHR, textStatus, errorThrown) {
							   $('#page-loader').removeClass('in');	
                               toastr.error('Some error occured'); 	
                     }
		 });
         
		
	});
	
	$('#edit_image').click(function(){
	  
	    $('.toolOne').show();
		$('.resolutionSet').hide();
		$('.screenlock').removeClass('show');
		$('#upload_btn').attr('disabled',false);	
		
		
	});
	
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
	
	$('#generate_image').click(function(){
		var file_name=$('#temp_uploaded_file_name').val();
		var name = $('#work_name').val();
		var work_date = $('#work_date').val();
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
			
				    url:baseurl+'index.php/custom_ajax/generate_resolution_image', 
					dataType: 'json',  
					data: 'selected_images='+selected+'&image='+file_name+'&work_name='+name+'&uploaded_file_name='+file+'&work_date='+work_date,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							window.location.href = baseurl;			
						}
					}
		 });
		
		
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
   
   $('#font-size').change(function(){	  
	  var font = $(this).val();
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type == 'text') {
       activeObject.set('fontSize',font);
       canvas.renderAll();
      }	   
	   
   });
   
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
			
				    url:baseurl+'index.php/custom_ajax/upload_image', 
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
                             canvas.setBackgroundImage(baseurl+'uploads/images/'+data.image+'', canvas.renderAll.bind(canvas),{width:800,height:500});
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
			
				    url:baseurl+'index.php/custom_ajax/upload_thumb_image', // point to server-side PHP script 
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
							fabric.Image.fromURL(baseurl+'uploads/thumb_images/'+data.image+'', function(myImg) {
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
					url:baseurl+'index.php/custom_ajax/create_work',
					success:function(data) {
						  if (data.status=='success'){
							window.location.href = baseurl+"index.php/index/works";			    				  
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
function loadText(){    
	 
}