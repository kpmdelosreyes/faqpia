 <!-- messagebox -->
<div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><div class="mar_bottom_20">
    <a href="#none" onclick="adminPageAddCategory.saveCategory();" class="btn_apply" title="Save Changes">Save</a>
    <a href="#none" onclick="adminPageAddCategory.undo();" class="add_link" title="Undo Changes">Undo Changes</a>
</div>

<div id="categories_wrap">

    <!-- Tree Menu -->
    <div id="description" class="section_arr">
        <h3>Drag and drop to rearrange categories.</h3>
		<div id="id_category_dnd_area" class="demo jstree jstree-0 jstree-focused jstree-default">
			<ul>
				<?php
					foreach($aCategoryList as $val)
					{
						echo '<li id="'.$val['idx'].'" class="jstree-leaf" rel="category" ci_idx="134" ci_parents_idx="0" ci_order="1" ci_ml_code="Faq" ci_ms_seq="1" ci_name="'.$val['category_name'].'" ci_publish_flag="Y" 
								ci_description="'.$val['category_description'].'" ci_seo_idx="val[]" seo_title="New Category" seo_url_key="New-Category" 
								seo_description="Category Description" seo_keywords="" seo_robots="All" seo_other_header_script="" ci_mode="modify" ci_default_flag="N">
								<ins class="jstree-icon">&nbsp;</ins>
								<a class="" href="#" style="-moz-user-select: none;">
								<ins class="jstree-icon">&nbsp;</ins>
								'.$val['category_name'].'</a>
						     </li>';
					}
				?>
			</ul>
		</div>
    </div>
    <!-- //Tree Menu -->

    <!-- Category Infomation -->
    <div id="in_wrap">

        <div class="section_info">
            <h3 class="add_h">Category Information</h3>
            <form name="faqpia_addcategory" class="faqpia_addcategory" method="post" enctype="multipart/form-data">

                <ul class="ul_input_vr">
                    <li id="id_category_idx" class="displaynone"></li>
                    <li>
                        <p>Category Name</p>
                        <p>
                            <span id="cate_name_wrap">
                                <input type="text" name="category_name" class="fix" maxlength="250" />
                            </span>
                            <span id="cate_del_wrap">
                                <a href="#none" onclick="adminPageAddCategory.delConfirm()" class="add_link" title="Delete Category">Delete Category</a>
                            </span>
                        </p>
                    </li>

                    <li>
                        <p>Status</p>
                        <p>
                            <select name="category_status">
                            	<option value="0">Unpublished</option>
                        		<option value="1">Published</option>
                            </select>
                        </p>
                    </li>

                    <li>
                        <p>Description</p>
                        <p><textarea cols="30" rows="5" name="category_description" class="cate"></textarea></p>
                    </li>
                </ul>

                <div class="stit_vr_wide">
                    <h3 class="add_h">
                        <a href="#none" onclick="adminPageAddCategory.toggle('id_seo_items', adminPageAddCategory.setSeoOnOff);" class="down" title="Search Engine Optimization">Search Engine Optimization                        <span class="vdn" id="id_seo_vdn">▼</span></a>
                    </h3>
                                    </div>

                <ul class="ul_input_vr displaynone" id="id_seo_items">
                    <li>
                        <p><label for="title">Title</label></p>
                        <p><input type="text" name="seo_title" class="fix" /></p>
                    </li>
                    <li>
                        <p><label for="url_key">URL Key</label></p>
                        <p><input type="text" name="seo_url_key" class="fix" /></p>
                    </li>
                    <li>
                        <p><label for="search_desc">Description</label></p>
                        <p><textarea cols="30" rows="5" name="seo_description" class="cate"></textarea></p>
                    </li>
                    <li>
                        <p>
                            <label for="keyword">Keywords</label>
                        </p>
                        <p><input type="text" name="seo_keywords" class="keyword" /></p>
                        <span class="annonce_vr">Use commas(,) to seperate keywords.</span>
                    </li>
                    <li>
                        <p><label for="robot">Robots</label></p>
                        <p>
                            <select name="seo_robots">
                            </select>
                        </p>
                    </li>
                    <li>
                        <p><label for="script">Other header Scripts</label></p>
                        <p><textarea cols="30" rows="5" name="seo_other_header_script" class="cate"></textarea></p>
                    </li>
                </ul>

            </form>

        </div>

    </div>
    <!-- //Category Infomation -->

</div>

<div class="tbl_lb_wide_btn">
    <a href="#none" onclick="adminPageAddCategory.saveContents();" class="btn_apply" title="Save Changes">Save</a>
    <a href="#none" onclick="adminPageAddCategory.undo();" class="add_link" title="Undo Changes">Undo Changes</a>
</div>

<!-- delete layer -->
<div id="id_layer_category_delete_contents" style="display:none">
    <p>Are you sure<br />
        you want to delete it?</p>
    <div class="ly_cnt_btn"><a href="#none" onclick="adminPageAddCategory.del();" class="btn_ly" title="Delete">Delete</a></div>
</div>