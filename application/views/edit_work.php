<div class="page-inner">
    <div id="page-loader" class="fade"><span class="spinner"></span></div>
    <!-- Pop up box starts -->
    <div class="overlay"></div>
    <div id="popup_box">
      <div class="popInner">
        <h2>Add Text</h2>
          <div>
                <!-- <input type="text" class="form-control" id="image_pop_text" name="image_pop_text" />-->
                 <textarea name="image_pop_text" style="height:100px" cols="5" id="image_pop_text" class="form-control" ></textarea>
          </div>
          <br />
          <br />
           <div class="form-group">
               <div >
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
    
    <div id="popup_box_icons">
      <div class="popInner">
        <h2>Choose Icons</h2>
          <div class="form-group scrollBox">
           <?php foreach($iconList as $icon): ?>
           <span class="iconBox"><a class="iconSet" data-toggle="tooltip" title="<?php echo $icon['keyword']; ?>" href="javascript:void(0)"><img width="57" height="50" src="<?php echo base_url(); ?>uploads/icons/<?php echo $icon['icon_name']; ?>" /></a></span>
           <?php endforeach; ?>       
         </div> 
          <div class="form-group">
               <div >
                       <a  class="btn btn-success" id="add_icon_btn">Add</a>
               </div>
          </div>          
        </div>
      <a id="popupBoxCloseicon"></a>  
    </div>
     
      <div id="popup_box_logos">
      <div class="popInner">
        <h2>Choose Logos</h2>
          <div class="form-group scrollBox">
           <?php foreach($logoList as $logo): ?>
           <span class="logoBox"><a class="logoSet" data-toggle="tooltip"  href="javascript:void(0)"><img  width="<?php echo $logo['logo_width']; ?>" height="<?php echo $logo['logo_height']; ?>" src="<?php echo base_url(); ?>uploads/logos/<?php echo $logo['logo_name']; ?>" /></a></span>
           <?php endforeach; ?>       
         </div> 
          <div class="form-group">
               <div >
                       <a  class="btn btn-success" id="add_logo_btn">Add</a>
               </div>
          </div>          
        </div>
      <a id="popupBoxCloselogo"></a>  
    </div>
    
                   
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
                                      <input type="hidden" class="form-control" id="work_id" name="work_id" value="<?php echo $wrk['work_id'] ?>">
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Work Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="work_name" name="work_name" value="<?php echo $wrk['work_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Work Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control date-picker" id="work_date" disabled="disabled" name="work_date" value="<?php echo $wrk['work_date'] ?>">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group" id="template_field" style="display:none">
                                            <label for="input-help-block" class="col-sm-2 control-label">Template</label>
                                            <div class="col-sm-3" id="template_select">
                                               <select name="template" class="form-control" id="template"><option value="-1"></option>
                                               </select> 
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
                                                <input type="text" class="form-control" id="work_end_date" name="work_end_date" value="<?php echo $wrk['end_date']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-5">
                                                
                                           
                                               <input type="hidden" name="temp_uploaded_file_name" id="temp_uploaded_file_name" />
                                               <input type="hidden" name="svg_file_name" id="svg_file_name" value="<?php echo $wrk['svg_file_name']; ?>" />
                                               <input type="hidden" name="thumb_file_name" id="thumb_file_name" />
                                            </div>
                                          
                                        </div> 
                <div class="row well well-sm toolArea">
                                        	<div class="col-md-9 ">
                                            	<div class="canvasNewContainer">
                                                   <!-- <span class="cropTop" ></span>
                                                	<span class="cropBottom" style="display:none"></span>-->
                                                    <span class="cropLeft" id="resln1"></span>
                                                    <span class="cropLeft" id="resln2"></span>
                                                    <span class="cropLeft" id="resln3"></span>
                                                    <span class="cropLeft" id="resln7"></span>
                                                    <span class="cropLeft" id="resln10"></span>
                                                	<span class="screenlock"></span>
                                            		<canvas id="canvas" width="800" height="450" style="border:1px soild red;"></canvas>
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
                                                     <!-- <input type="text" id="image_text" name="image_text" class="form-control" />-->
                                                      <textarea name="image_text" cols="5" style="height:100px" id="image_text" class="form-control" ></textarea>
                                                     </div>
                                                   </div>
                                                   <div class="form-group">
                                                     <a  id="add_icon" name="add_icon" class="btn btn-success">Add Icons</a>
                                                   </div> 
                                                    <div class="form-group">
                                                     <a  id="add_logo" name="add_logo" class="btn btn-success">Add Logo</a>
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
                                                        <label class="control-label">Crop</label><br/>
                                                        <div class="col-md-5" style="padding:0">
                                                         <select name="crop" id="crop" class="form-control col-md-3">
                                                           <option value="left" selected="selected">Left</option>
                                                           <option value="right" >Right</option>
                                                         </select>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group">                                            
                                                        <label class="control-label">Crop from</label><br/>
                                                        <div class="col-md-5" style="padding:0">
                                                         <select name="crop_from" id="crop_from" class="form-control col-md-3">
                                                           <option value="top">Top</option>
                                                           <option value="bottom" selected="selected">Bottom</option>
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
                                                                     <input type="checkbox" class="resolution_chkbox" id="resolution1" name="resolution1" value="1024X768">1024X768 
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution2" name="resolution2" value="1152X864">1152X864
                                                                </label>
                                                            </div>
                                                             <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution3" name="resolution3" value="1280X1024" >1280X1024 
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution4" name="resolution4" value="1366X768">1366X768
                                                                </label>
                                                            </div>
                                                             <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution5" name="resolution5" value="1440X900">1440X900
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution6" name="resolution6" value="1600X900">1600X900
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution7" name="resolution7" value="1600X1200">1600X1200
                                                                </label>
                                                            </div>
                                                             <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution8" name="resolution8" value="1680X1050">1680X1050
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution9" name="resolution9" value="1920X1080">1920X1080
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="resolution_chkbox" id="resolution10" name="resolution10" value="2736x1824">2736x1824
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
var text_counter=0;
$(document).ready(function(){	  
      $('[data-toggle="tooltip"]').tooltip();
	  canvas.clear().renderAll();
	  $('#image_select_text').hide();
	  var svg = $('#svg_file_name').val();
	  fabric.loadSVGFromURL('<?php echo base_url();?>uploads/svg/'+svg+'', function(objects, options) {
      var obj = fabric.util.groupSVGElements(objects, options);
      var arr_len = obj.paths.length;
	  var new_obj = obj.paths[0];
	 
	  var background_image = new_obj._originalElement.currentSrc;
	  canvas.setBackgroundImage(background_image, canvas.renderAll.bind(canvas),{width:800,height:450});
	  // Rndering each svg elements to canvas;
	  _renderLoopSvgObjects(objects,options,canvas);	
	  $('.toolArea').show();
	  
	   
   });

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
							
									
				                   
									/*var left_ratio = left/800;
									var top_ratio = top/450;
									left = 800*left_ratio;
									top = 450*top_ratio;
									var width_ratio = val.width/1920;
									var height_ratio = val.height/1080;
									var wid = 800*width_ratio;
									var heigh = 450*height_ratio;
									wid = wid-3;
									heigh = heigh-3;*/
								
							 fabric.Image.fromURL(val._originalElement.currentSrc, function(image) {
                                canvas.add(image).renderAll();
                              }, {
                                id: val.id,
                                num: val.num,
                                
								left:val.Left,
								top:val.Top,
								height:val.height,
								width:val.width,
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
										
										  val.set({
											originX:"left",
											originY:"top",
											perPixelTargetFind: true,
											left:left,
											top:top,
											transformMatrix:null,
											strokeDashArray:null,
											width:val.width,
											height:val.height,
											stroke:val.stroke						
										});		
								      canvas.add(val);
				                     canvas.renderAll();
				                     canvas.calcOffset();
										  
										 
										}
																		
									}
								
								}
								else if(val.type=='text'){
									console.log(val);
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
									left = left +130;
									top  = top +50;
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
			id:val.id,
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
	  $('.logoSet').removeClass('active'); 
	  	  
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
					var myID='line_'+activeObject.id;
					canvas.getObjects().map(function(o) {                     
					   if(o.id==myID)
					     canvas.remove(o);
		
                     });					
				  }
				  else {
				     //activeObject.set('textDecoration','underline');	
					
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
		$('.resolution_chkbox').attr('checked', false);
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
   //Edit text on canvas
   $('#add_text_btn').click(function(){	  
	  var image_text = $('#image_pop_text').val();
	  text_counter=text_counter+1;
	  if(image_text!=''){
		  var tbText = new fabric.Text(""+image_text+"", {
			top: 250,
			left: 380,
			fill: "#fff",
			id:"text_"+text_counter,
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

   /**********On moving ****************/
    canvas.on('mouse:move', function(e) {
     var obj = canvas.getActiveObject(); 
      if(obj && obj.left < -1*(obj.width*obj.scaleX/2)+20){
      setActiveProp("left",-1*(obj.width*obj.scaleX/2)+20);
      canvas.renderAll(); 
      canvas.calcOffset();
      }
       if(obj && obj.top < -1*(obj.height*obj.scaleY/2)+10){
      setActiveProp('top',-1*(obj.height*obj.scaleY/2)+10);
      canvas.renderAll(); 
      canvas.calcOffset();
      }
      if(obj && obj.left > (parseInt(800)+(obj.width*obj.scaleX/2)-20)){
       setActiveProp('left',parseInt(800)+(obj.width*obj.scaleX/2)-20);
       canvas.renderAll(); 
       canvas.calcOffset();       
      }  
       if(obj && obj.top > (parseInt(450)+(obj.height*obj.scaleY/2)-20)){
       setActiveProp('top',parseInt(450)+(obj.height*obj.scaleY/2)-20);
       canvas.renderAll(); 
       canvas.calcOffset();
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
		var canvas_data  = canvas.toSVG({viewBox:{x:0,y:0,width:800,height:450}});
		console.log(canvas_data);
		
		//var file_name = $('#uploaded_file_name').val();
		$('#page-loader').addClass('in');
		$.ajax({
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/generate_image', 
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
		var work_id = $('#work_id').val();
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
			
				    url:'<?php echo base_url();?>'+'index.php/custom_ajax/generate_resolution_image', 
					dataType: 'json',  
					data: 'selected_images='+selected+'&image='+file_name+'&work_name='+name+'&uploaded_file_name='+file+'&work_date='+work_date+'&svg_file_name='+svg_file_name+'&type=edit&start_date='+start_date+'&end_date='+end_date+'&thumb_file_name='+thumb_file_name+'&crop_from='+crop_from+'&work_id='+work_id+'&crop='+crop,                         
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