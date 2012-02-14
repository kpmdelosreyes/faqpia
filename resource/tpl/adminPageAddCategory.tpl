 <!-- messagebox -->
<div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><div class="mar_bottom_20">
    <a href="#none" onclick="adminPageAddCategory.saveCategory();" class="btn_apply" title="Save Changes">Save</a>
    
</div>

<div id="categories_wrap">

    <!-- Tree Menu -->
    <div id="description" class="section_arr">
        <h3>Drag and drop to rearrange categories.</h3>
		<div id="id_category_dnd_area" class="demo jstree jstree-0 jstree-focused jstree-default">
		<form name="faqpia_category" class="faqpia_category" method="post" enctype="multipart/form-data">
			<ul>
				<?php foreach($aCategoryList as $val): ?>
					<li id="category_id" class="jstree-leaf" rel="category" >
						<ins class="jstree-icon">&nbsp;</ins>
						<a id="categories" class="" href="<?php echo usbuilder()->getUrl("adminPageCategoryList"); ?>&idx=<?php echo $val['idx']; ?>" style="-moz-user-select: none;">
							<ins class="jstree-icon">&nbsp;</ins>
							<?php echo $val['category_name']; ?>
						</a>
				    </li>				
			     <?php endforeach;?>
			</ul>
		</form>
		</div>
    </div>
    <!-- //Tree Menu -->

    <!-- Category Infomation -->
    <div id="in_wrap">

        <div class="section_info">
            <h3 class="add_h">Category Information</h3>
            <form name="faqpia_addcategory" class="faqpia_addcategory" method="post" enctype="multipart/form-data">

					<ul class="ul_input_vr">
			
						<li><p>Category Name</p><p>
								<span id="cate_name_wrap"><input type="text" name="category_name" class="fix" maxlength="250" fw-filter="isFill&isMax[250]" value="" /></span>
							</p>
						</li>
						<li><p>Status</p>

							<p>
								<select id="category_status" name="category_status">
									<option value="0" >Unpublished</option>
									<option value="1" >Published</option>
								</select>
							</p>
						</li>
						<li><p>Description</p>
							<p><textarea cols="30" rows="5" name="category_description" class="cate" id="description" name="description" fw-filter="isFill" fw-label="Description"></textarea></p>
						</li>
					 
					</ul>
            </form>

        </div>

    </div>
    <!-- //Category Infomation -->

</div>

<div class="tbl_lb_wide_btn">
    <a href="#none" onclick="adminPageAddCategory.saveContents();" class="btn_apply" title="Save Changes">Save</a>
  
</div>

<!-- delete layer -->
<div id="id_layer_category_delete_contents" style="display:none">
    <p>Are you sure<br />
        you want to delete it?</p>
    <div class="ly_cnt_btn"><a href="#none" onclick="adminPageAddCategory.del();" class="btn_ly" title="Delete">Delete</a></div>
</div>