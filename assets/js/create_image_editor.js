// JavaScript Document
var canvas = new fabric.Canvas('canvas');
var base_url = 'http://13.66.226.25/dusupwallpaper/';
var text_counter=0;
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	
 $('.resolution_chkbox').on('click', function (e) {
   var attr_id = this.id;
   var crop = $('#crop').val();
  if(this.checked && attr_id=='resolution10')  {
	if(crop=='left'){
   	 $("#resln10").removeClass('right120');	
	 $("#resln10").addClass('left120');
	}
	else{
	   $("#resln10").removeClass('left120');	
	   $("#resln10").addClass('right120');	
	}
   }
  else if(!this.checked && attr_id=='resolution10')  {
	$("#resln10").removeClass('left120');
	$("#resln10").removeClass('right120');	
   }
  else  if(this.checked && attr_id=='resolution3')  {
	
	if(crop=='left'){
   	 $("#resln3").removeClass('right120');	
	$("#resln3").addClass('left420');
	}
	else{
	   $("#resln3").removeClass('left420');	
	   $("#resln3").addClass('right420');	
	}
   } 
  else  if(!this.checked && attr_id=='resolution3')  {
	$("#resln3").removeClass('left420');
	$("#resln3").removeClass('right420');
   } 
  else  if(this.checked && attr_id=='resolution1')  {
	
	if(crop=='left'){
   	 $("#resln1").removeClass('right320');	
	 $("#resln1").addClass('left320');
	}
	else{
	   $("#resln1").removeClass('left320');	
	   $("#resln1").addClass('right320');	
	}
   } 
  else  if(!this.checked && attr_id=='resolution1')  {
	$("#resln1").removeClass('left320');
	$("#resln1").removeClass('right320');
   }
  else  if(this.checked && attr_id=='resolution2')  {
	if(crop=='left'){
   	 $("#resln2").removeClass('right320');	
	 $("#resln2").addClass('left320');
	}
	else{
	   $("#resln2").removeClass('left320');	
	   $("#resln2").addClass('right320');	
	}
   } 
  else  if(!this.checked && attr_id=='resolution2')  {
	$("#resln2").removeClass('left320');
	$("#resln2").removeClass('right320');
   } 
   else  if(this.checked && attr_id=='resolution7')  {
	if(crop=='left'){
   	 $("#resln7").removeClass('right320');	
	 $("#resln7").addClass('left320');
	}
	else{
	   $("#resln7").removeClass('left320');	
	   $("#resln7").addClass('right320');	
	}
   } 
  else  if(!this.checked && attr_id=='resolution7')  {
	$("#resln7").removeClass('left320');
	$("#resln7").removeClass('right320');	
   }     
   


	
 });
		  
    $('#category').on('change',function(){
		var category = $(this).val();
		if(category==-1)
		  return false;
		$('#page-loader').addClass('in');
		$.ajax({			
				url:base_url+'index.php/custom_ajax/get_template_list', 
				dataType: 'json',  
				data: 'category='+category,                         
				type: 'post',
				success: function(data){
					if(data.status=='success'){							
						$('#template_select').html(data.select_box);
						$('#template_field').show();
						$('#page-loader').removeClass('in');
					}
				}
		 });
		
		
	});
    
   $(document).on('change', '#template', function(e) {
	  canvas.clear().renderAll();
	  $('#page-loader').addClass('in');
	  $('#image_select_text').hide();
	  var svg = $(this).val();
	  var svg_file = svg+'.svg';
	  fabric.loadSVGFromURL(''+base_url+'uploads/svg_templates/'+svg+'/'+svg_file+'', function(objects, options) {
		  var obj = fabric.util.groupSVGElements(objects, options);
		  var arr_len = obj.paths.length;
		  var new_obj = obj.paths[0];
		  var background_image = new_obj._originalElement.currentSrc;
		  canvas.setBackgroundImage(background_image, canvas.renderAll.bind(canvas),{width:800,height:450});
		  // Rndering each svg elements to canvas;
		  _renderLoopSvgObjects(objects,options,canvas);	
		  $('.toolArea').show();
	      $('#page-loader').removeClass('in');
      });
   
   });
   
   _renderLoopSvgObjects = function(objects,options,canvas){	  
		var svg_width = options.width,
		svg_height = options.height,		
		a=b=c=d=e=f=x=y=0,
		mtrx,left,top,scaleX ,scaleY,							
		totObject = objects.length,	
		counter = 0,conti=false
		image_counter=0,
		groupedobjects = new Array();
													
		$.each(objects,function(index,val){	 													
					counter ++;
					conti=true;
      		        if(val.type=='image'){			
						image_counter++;
					    if(image_counter!=1){   
							mtrx = val.transformMatrix;	    
							if(mtrx ){									
								a = mtrx[0]?parseFloat(mtrx[0]):0;
								b = mtrx[1]?parseFloat(mtrx[1]):0;
								c = mtrx[2]?parseFloat(mtrx[2]):0;
								d = mtrx[3]?parseFloat(mtrx[3]):0;
								e = mtrx[4]?parseFloat(mtrx[4]):0;
								f = mtrx[5]?parseFloat(mtrx[5]):0;
								if(val.type == 'text'){
											x = val.left;
											y = val.top;
								}
								else{
											x = 0;
											y = 0;
								}
								 left = ((x*a)+e);
								 top  = ((y*d)+f);
		
							}
							else{
										left = val.left;
										top  = val.top;
							}
						   sx=Math.sqrt(a*a+b*b);
						   sy=Math.sqrt(c*c+d*d);
						   if(val.ScaleX ){
										scaleX = val.ScaleX;	
							}
						  else{
										scaleX = sx;		
						  }
						  if(val.ScaleY ){
										scaleY = val.ScaleY;	
						  }
						 else{
										scaleY = sy;		
						  }
							
									
				
						var left_ratio = left/1920;
						var top_ratio = top/1080;
						left = 800*left_ratio;
						top = 450*top_ratio;
						var width_ratio = val.width/1920;
						var height_ratio = val.height/1080;
						var wid = 800*width_ratio;
						var heigh = 450*height_ratio;
						/*for error rectificaion */
						wid = wid-5;
						heigh = heigh-5;
		
		 				fabric.Image.fromURL(val._originalElement.currentSrc, function(image) {
                        canvas.add(image).renderAll();
                              }, {
                                id: val.id,
                                num: val.num,
                                originX:"left",
								originY:"top",
								left:left,
								top:top,
								height:heigh,
								width:wid,
								scaleX:scaleX,
								scaleY:scaleY
								

                              }); 

								}
								 
								 }
						  else if(val.type=='rect'){
									
									if(val.name == 'outer_rect'){
										val.set({
											lockMovementX : true,
											lockMovementY : true,
											lockScalingX : true,
											lockScalingY : true,
											lockUniScaling : true,
											lockRotation  : true,
											hasControls : false,
											perPixelTargetFind: true,
											originX:"left",
											originY:"top",
											angle: val.angle,
											left:0,
											top:0,
											transformMatrix:null,
											strokeDashArray:null,
											width:canvas.width,
											height:canvas.height,											
										});	
									}
									else{
										if(val.stroke=='#FFFFFF'){
										  var lockmovementx =true;
										  var lockmovementy = true;
										  var lockscalingx  = true;
										  var lockscalingy  = true;	
										var left_ratio = val.left/1920;
									var top_ratio = val.top/1080;
									left = 800*left_ratio;
									top = 450*top_ratio;
									var width_ratio = val.width/1920;
									var height_ratio = val.height/1080;
									var wid = 800*width_ratio;
									var heigh = 450*height_ratio;
										  val.set({
											originX:"left",
											originY:"top",
											perPixelTargetFind: true,
											left:left,
											top:top,
											transformMatrix:null,
											strokeDashArray:null,
											width:wid,
											height:heigh,
											stroke:val.stroke						
										});		
								      canvas.add(val);
				                     canvas.renderAll();
				                     canvas.calcOffset();
										  
										 
										}
																		
									}
								
								}
								else if(val.type=='text'){	
								mtrx = val.transformMatrix;
								    
									if(mtrx ){
										
										
										a = mtrx[0]?parseFloat(mtrx[0]):0;
										b = mtrx[1]?parseFloat(mtrx[1]):0;
										c = mtrx[2]?parseFloat(mtrx[2]):0;
										d = mtrx[3]?parseFloat(mtrx[3]):0;
										e = mtrx[4]?parseFloat(mtrx[4]):0;
										f = mtrx[5]?parseFloat(mtrx[5]):0;
										
										left = ((x*a)+e);
										top  = ((y*d)+f);

										
										
									}
									else{
										left = val.left;
										top  = val.top;
									}
									if(val.left == 0 ) {
										originX	 ="left";	
									}
									else{
										originX	 =val.originX;	
									}
									if(val.top == 0 ) {
										originY	 ="bottom";	
										
									}
									else{
										originY	 =val.originY;	
									}		
									var fntSz = val.fontSize;
									var fntSzPx = fntSz*1.33
									var fontSize =  fntSzPx*scaleX
									var fontSize = Math.round((fontSize*75)/100);	
																	
									var $tempfontFamily = new String(val.fontFamily);						
									
									
									$tempfontFamily = $tempfontFamily.replace("'","");
									$tempfontFamily = $tempfontFamily.replace("'","");								
									
									$tempfontFamily = $tempfontFamily.toLowerCase();
									
									console.log(val.text);
									$fntAttr = _getForStyles($tempfontFamily,val);
									
									
									
									var text=val.text;
									
									
									var fntWdth = left+val.width;
									if(val.ScaleX){
										scaleX = val.ScaleX;
									}
									else{
										scaleX = val.scaleX;
										left  =left*scaleX;
									}
									if(val.ScaleY){
										scaleY = val.ScaleY;
									}
									else{
										scaleY = val.scaleY;
										top  =top*scaleY+5;
										
									}			
									var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));

									
									var left_ratio = left/1920;
									var top_ratio = top/1080;
									left = 800*left_ratio;
									top = 450*top_ratio;
									console.log(text.split(' ').length);
									var tet = text.split(' ');
									var newhtml = [];
                                   
    for(var i=0; i< tet.length; i++) {
        
        if(i>0 && (i%8) == 0)
            newhtml.push("\n");
        
        newhtml.push(tet[i]);
    }
	   text = newhtml.join(" ");
									var tbText = new fabric.Text(""+text+"", {
			top: top,
			left: left,
			fill: val.fill,
			lockScalingX:true,
			lockScalingY:true,
			fontFamily:$fntAttr.fontFamily,
			width:1,
			fontSize:9,
			fontStyle:$fntAttr.fontStyle?$fntAttr.fontStyle.toLowerCase():'normal',
			fontWeight:$fntAttr.fontWeight?$fntAttr.fontWeight.toLowerCase():'normal'
		 });
		 canvas.add(tbText);
									
				             canvas.renderAll();
				             canvas.calcOffset();	
										
								}
								
									canvas.renderAll();
									canvas.calcOffset();
									
								
								
								
								
						});
			
		
		return true;
	 
	    
	   
   }
   
   _getForStyles = function (fonttext,obj){
					//Fonts = opts.svgFonts;
					var $tempSplitArray = [];
					var $tempfontStyle;
									
					var $fontWeight = 'normal';
					var $fontStyle = 'normal';
					var $fontIndex = 'regular';
					
					var $tempFontName = fonttext;		
					$tempSplitArray = fonttext.split('-');									
					$tempfont =  $tempSplitArray[0];	
					$tempfontFamily = $tempfont.replace(/ /g, "_");	
					$tempfontFamily = $tempfontFamily.replace(/-/g, "_");
					
					//$tempfontFamily1 = $tempfont.replace(/ /g, "_");	
					//$tempfontFamily1 = $tempfontFamily1.replace(/-/g, "_");
											
					$tempfontStyle = $tempSplitArray[1];									
						
					
							switch($tempfontStyle){
								case "bolditalic":
								case "bolditalicmt":
									$fontWeight = 'bold';
									$fontStyle = 'italic';
									$fontIndex = 'bolditalic';
								break;
								case "italicbold":
								case "italicboldmt":
									$fontWeight = 'bold';
									$fontStyle = 'italic';
									$fontIndex = 'italicbold';
								break;
								case "italic":
								case "italicmt":
									$fontStyle = 'italic';
									$fontIndex = 'italic';
									
								break;
								case "bold":
								case "boldmt":
									$fontWeight = 'bold';
									$fontIndex = 'bold';
								break;
								default:
									$fontWeight = obj.fontWeight;
									$fontStyle = obj.fontStyle;
									if(obj.fontStyle !='normal' && obj.fontWeight !='normal')
										$fontIndex = obj.fontWeight+obj.fontStyle;
									else if(obj.fontStyle !='normal')
										$fontIndex = obj.fontStyle;
									else if(obj.fontWeight !='normal')
										$fontIndex = obj.fontWeight;
										
									
								break;
							}
					
					var fontFamily = 'Arial';
					var fontFamilySelected  = 'Arial';
					var useNative = true;
					
					//console.log($tempfontFamily); //|| $.inArray( $tempfontFamily1, Font ) >= 0
					/*if(Fonts){
							$.each(Fonts[0], function(fnt, Font) {
							if($.inArray( $tempfontFamily, Font ) >= 0){												
								fontFamily = $tempfontFamily;
								baseFont = fnt;
							}
						});
					}*/
				
				
					/*if(Fonts[0][$tempfontFamily]){
						fontFamily = $tempfontFamily;
						console.log($fontIndex); console.log(Fonts[0][$tempfontFamily]);
						if(Fonts[0][$tempfontFamily][$fontIndex]){
							fontFamily = Fonts[0][$tempfontFamily][$fontIndex]; 
							//console.log(Fonts[0][$tempfontFamily]['regular']);
							fontFamilySelected = Fonts[0][$tempfontFamily]['regular'];
						}
					}*/
										
					//console.log(fontFamilySelected);
					var output = {'fontFamily':fontFamily,'fontWeight':$fontWeight,'fontStyle':$fontStyle,'fontFamilySelected':fontFamilySelected}	;
					return output;
		}
  		
   $('#add_text').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box').show();
	});
	
   $('#add_image').click(function(){		  
		  $('.overlay').addClass('show');
		  $('#popup_box_upload').show();
	});
	
   $('#add_icon').click(function(){
	  
	  $('.overlay').addClass('show');
	  $('#popup_box_icons').show(); 
	  $('.iconSet').removeClass('active'); 
	   
   });
   
   $('#add_logo').click(function(){
	  $('.overlay').addClass('show');
	  $('#popup_box_logos').show(); 
	  $('.iconSet').removeClass('active'); 
	   
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
   
   $('#popupBoxCloseicon,.overlay').click(function(){
	  $('#popup_box_icons').hide();
      $('.overlay').removeClass('show');
	  $('.iconSet').removeClass('active'); 
	  	  
   });
   $('#popupBoxCloselogo,.overlay').click(function(){
	  $('#popup_box_logos').hide();
      $('.overlay').removeClass('show');
	  $('.iconSet').removeClass('active'); 
	  	  
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
   
   $('.iconSet').click(function(){
	  
	  $('.iconSet').removeClass('active');
	  $(this).addClass('active'); 
	   
   });
   $('.logoSet').click(function(){
	  
	  $('.logoSet').removeClass('active');
	  $(this).addClass('active'); 
	   
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
			      if(parentClass=='active'){
                     //activeObject.set('textDecoration','normal');
					// activeObject.setTextDecoration('normal');
					var myID='line_'+activeObject.id;
					canvas.getObjects().map(function(o) {                      
					if(o.id==myID)
					     canvas.remove(o);   
                    });
				  }
				  else {
				     //activeObject.set('textDecoration','underline');	
					//activeObject.setTextDecoration('underline');
					canvas.add(new fabric.Line([activeObject.left, activeObject.top, activeObject.left+activeObject.width, activeObject.top], {
						left: activeObject.left,
						top: activeObject.top+activeObject.height,
						id:"line_"+activeObject.id,
						stroke: 'white'
					}));

					 
				  }
                  canvas.renderAll();
          }		
		   
	   } 
		
		
	});
	
	//Reedtit Image
	$('#edit_image').click(function(){
	   $('.resolutionSet input:checked').each(function() {
		    var attr_id = this.id;
			
         if(this.checked){
         $('#'+attr_id).attr('checked', false); 
		 $('#'+attr_id).closest('span').removeClass('checked')
        }
    
        });
	   
		$('.cropLeft').removeClass('left120');
		$('.cropLeft').removeClass('left320');
		$('.cropLeft').removeClass('left420');
		$('.cropLeft').removeClass('right120');
		$('.cropLeft').removeClass('right320');
		$('.cropLeft').removeClass('right420');
	    $('.toolOne').show();
		$('.resolutionSet').hide();
		$('.screenlock').removeClass('show');
		$('#upload_btn').attr('disabled',false);
		
		
	});
	
	
	
	$('#add_icon_btn').click(function(){	  
	  $('.iconSet').each(function(){
		 if($(this).hasClass('active')){
			var imgSrc = $(this).find('img').attr('src');
			fabric.Image.fromURL(imgSrc, function(myImg) {
								 var img1 = myImg.set({ left: 400, top: 200,width:50,height:50});
								 canvas.add(img1); 
								}); 
		  $('#popup_box_icons').hide();
		  $('.overlay').removeClass('show');					
		 }
	  });
	  
	   
   });
   $('#add_logo_btn').click(function(){	  
	  $('.logoSet').each(function(){
		 if($(this).hasClass('active')){
			var imgSrc = $(this).find('img').attr('src');
			fabric.Image.fromURL(imgSrc, function(myImg) {
								 var img1 = myImg.set({ left: 400, top: 200,width:100,height:50});
								 canvas.add(img1); 
								}); 
		  $('#popup_box_logos').hide();
		  $('.overlay').removeClass('show');					
		 }
	  });
	  
	   
   });
   //Edit text on canvas
   $('#add_text_btn').click(function(){	  
	  var image_text = $('#image_pop_text').val();
	  //image_text = image_text.replace(/'/, "\\'");
	  if(image_text!=''){
		  text_counter=text_counter+1;
		  var tbText = new fabric.Text(""+image_text+"", {
			top: 250,
			left: 380,
			id:"text_"+text_counter,
			fill: "#fff",
			lockScalingX:true,
			lockScalingY:true,
			fontFamily:"Arial",
			width:10,
			fontSize:10
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
	
	
	
	//Convert image from svg 
	
	$('#save_image').click(function(){
		var canvas_data  = canvas.toSVG({viewBox:{x:0,y:0,width:800,height:450}});
		console.log(canvas_data);
		
		//var file_name = $('#uploaded_file_name').val();
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:base_url+''+'index.php/custom_ajax/generate_image', 
					dataType: 'json',  
					data: 'canvas_data='+escape(canvas_data),                         
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
		var svg_file_name= $('#svg_file_name').val();
		var thumb_file_name = $('#thumb_file_name').val();
		var crop_from =$('#crop_from').val();
		var crop =$('#crop').val();
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
			
				    url:base_url+''+'index.php/custom_ajax/generate_resolution_image', 
					dataType: 'json',  
					data: 'selected_images='+selected+'&image='+file_name+'&work_name='+name+'&uploaded_file_name='+file+'&work_date='+work_date+'&svg_file_name='+svg_file_name+'&type=create&start_date='+start_date+'&end_date='+end_date+'&thumb_file_name='+thumb_file_name+'&crop_from='+crop_from+'&crop='+crop,                         
					type: 'post',
					success: function(data){
						if(data.status=='yes'){
							window.location.href = base_url;			
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
			
				    url:base_url+''+'index.php/custom_ajax/upload_thumb_image', // point to server-side PHP script 
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
							fabric.Image.fromURL(''+base_url+'uploads/thumb_images/'+data.image+'', function(myImg) {
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
					url:base_url+''+'index.php/custom_ajax/create_work',
					success:function(data) {
						  if (data.status=='success'){
							window.location.href = ""+base_url+"index.php/index/works";			    				  
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
