 <!-- messagebox -->
<div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><div class="mar_bottom_20">
	
    <a href="#none" onclick="adminPageCategoryList.saveCategory();" class="btn_apply" title="Save Changes">Save</a>
    <a href="#none" onclick="adminPageCategoryList.undo();" class="add_link" title="Undo Changes">Undo Changes</a>
</div>
<div class="tbl_btom_rgt"><a href="<?php echo usbuilder()->getUrl("adminPageAddCategory");?>" class="btn_nor_01 btn_width_st2" title="Add">Add</a></div>
<div id="categories_wrap">

    <!-- Tree Menu -->
    <div id="description" class="section_arr">
        <h3>Drag and drop to rearrange categories.</h3>
        <div id="id_category_dnd_area" class="demo jstree jstree-0 jstree-focused jstree-default">
			<ul>
				<?php foreach($aCategoryList as $val): ?>
					<li id="<?php echo $val['idx']; ?>" class="jstree-leaf" rel="category" ci_idx="<?php echo $value['idx']; ?>" ci_parents_idx="0" ci_order="1" ci_ml_code="Faq" ci_ms_seq="1" ci_name="<?php echo $val['category_name']; ?>" ci_publish_flag="Y" 
							ci_description="<?php echo $val['category_description']; ?>" ci_seo_idx="val[]" seo_title="New Category" seo_url_key="New-Category" 
							seo_description="Category Description" seo_keywords="" seo_robots="All" seo_other_header_script="" ci_mode="modify" ci_default_flag="N">
							<ins class="jstree-icon">&nbsp;</ins>
							<a class="" href="#" style="-moz-user-select: none;"><ins class="jstree-icon">&nbsp;</ins><?php echo $val['category_name']; ?></a>
				     </li>				
			     <?php endforeach;?>
			</ul>
		</div>

    </div>
    <!-- //Tree Menu -->

    <!-- Category Infomation -->
    <div id="in_wrap">
            
        <div class="section_info">
            <h3 class="add_h">Category Information</h3>

  				<form name="category_form">
  				
					<ul class="ul_input_vr">
						<?php foreach($aCategoryList as $value):?>
						<li id="id_category_idx" class=""><p>Category ID : <?php echo $value['idx']; ?></p></li>

						<li><p>Category Name</p><p>
								<span id="cate_name_wrap"><input type="text" name="category_name" class="fix" maxlength="250" fw-filter="isFill&isMax[250]" value="<?php echo $value['category_name']; ?>" /></span>
								<span id="cate_del_wrap"><a href="#none" id="delete" class="add_link" title="Delete Category">Delete Category</a></span>
							</p>
						</li>
						<li><p>Status</p>

							<p>
								<select id="category_status" name="category_status">
									<option value="0" <?php if( $value['category_name'] == "0") echo "selected"; ?>>Unpublished</option>
									<option value="1" <?php if( $value['category_name'] == "1") echo "selected"; ?>>Published</option>
								</select>
							</p>
						</li>
						<li><p>Description</p>
							<p><textarea cols="30" rows="5" name="category_description" class="cate" id="description" name="description" fw-filter="isFill" fw-label="Description"><?php echo $value['category_description']; ?></textarea></p>
						</li>
					    <?php endforeach;?>	
					</ul>
					
				</form>	
				
        </div>

    </div>
    <!-- //Category Infomation -->

</div>

<div class="tbl_lb_wide_btn">
    <a href="#none" onclick="adminPageCategoryList.saveCategory();" class="btn_apply" title="Save Changes">Save</a>
    <a href="#none" onclick="adminPageCategoryList.undo();" class="add_link" title="Undo Changes">Undo Changes</a>
</div>

<!-- delete layer -->
<div id="id_layer_category_delete_contents" style="display:none">
    <p>Are you sure<br />
        you want to delete it?</p>
    <div class="ly_cnt_btn"><a href="#none" onclick="adminPageCategoryList.del();" class="btn_ly" title="Delete">Delete</a></div>
</div>