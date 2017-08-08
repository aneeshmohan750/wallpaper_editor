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
           <span class="iconBox"><a class="iconSet" data-toggle="tooltip" title="<?php echo $icon['keyword']; ?>" href="javascript:void(0)"><img alt="<?php echo $icon['keyword']; ?>" width="57" height="50" src="<?php echo base_url(); ?>uploads/icons/<?php echo $icon['icon_name']; ?>" /></a></span>
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
                    <h3><strong>Create Work</strong></h3>
                      <div class="create_btn"><!--<a class="btn btn-primary btn-addon m-b-sm btn-sm" href="javascript:void(0)" name="create" id="create">Save</a>--> <a  class="btn btn-danger btn-sm discard_btn" href="<?php echo base_url();?>">Discard</a></div>
                </div>
                
                <div id="main-wrapper">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Create New</h4>
                                </div>
                                <div class="panel-body">
                                     <form class="form-horizontal" name="create_work" id="create_work" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Work Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="work_name" name="work_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Work Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control date-picker" id="work_date" disabled="disabled" name="work_date" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                       
                                       
                                       <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Category</label>
                                            <div class="col-sm-3">
                                               <select name="category" class="form-control" id="category"><option value="-1"></option>
                                               <?php foreach($categoryList as $category): ?>
                                                <option value="<?php echo $category['id'];?>"><?php echo $category['name']; ?></option>
                                               <?php endforeach; ?>
                                               </select> 
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
                                                <input type="text" class="form-control" id="work_start_date" name="work_start_date" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="work_end_date" name="work_end_date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-5">
                                                
                                           
                                               <input type="hidden" name="temp_uploaded_file_name" id="temp_uploaded_file_name" />
                                               <input type="hidden" name="svg_file_name" id="svg_file_name" />
                                               <input type="hidden" name="thumb_file_name" id="thumb_file_name" />
                                            </div>
                                          
                                        </div> 
                <div class="row well well-sm toolArea">
                                        	<div class="col-md-9 ">
                                            	<div class="canvasNewContainer">
                                                    <!--<span class="cropTop" ></span>
                                                	<span class="cropBottom"></span>-->
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
                                                        <div id="resolutionDiv">
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
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div>
                

             
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/create_image_editor.js"></script>