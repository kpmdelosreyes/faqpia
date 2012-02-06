    <!-- messagebox -->
    <div id="message_box" class="">
        <p><span></span></p>
    </div>
    <!-- end of messagebox -->

    <!--  print Validation Message -->
    <div id="validation_message" class="msg_warn_box" style="display:none"></div><div id='faqpia_delete_popup_contents' style='display:none'>
        <div class="admin_popup_contents">
            Are you sure you want to delete this entry?<br /><br />
            <a class="btn_nor_01 btn_width_st1" href="javascript: void(0);" style='cursor:pointer' title="Delete" onclick="javascript: adminPageContentsList.deleteCheckedvalues();"> Delete </a>
        </div>
    </div>  

        <a href="<?php echo usbuilder()->getUrl("adminPageContentsList");?>" class="all selected" title="Show all questions">All(<?php echo $total;?>)</a> &nbsp; | &nbsp;
        <a href="<?php echo usbuilder()->getUrl("adminPageContentsList").'&status=Published';?>"  title="Show published questions only">Published(<?php echo $published;?>)</a> &nbsp; | &nbsp;
        <a href="<?php echo usbuilder()->getUrl("adminPageContentsList").'&status=Unpublished';?>"  title="Show unpublished questions only">Unpublished(<?php echo $unpublished;?>)</a><br /><br />
        
        <select id="actions" style="width:150px;">
            <option value="0">Select Action</option>
            <option value="1">Publish</option>
            <option value="2">Unpublish</option>
            <option value="3">Delete</option>
        </select>
        <a href="javascript: void(0);" onclick="javascript: adminPageContentsList.apply();" class="btn_nor_01 btn_width_st1" title="Filter by selected condition">Apply</a>
        <select id="categories" style="width:150px;">
            <option value="1">Our Services</option>
            <option value="2">Our Products</option>
            <option value="3">Account Management</option>
            <option value="4">Recruit</option>
        </select>
        <a href="javascript: void;" onclick="javascript: window.location.href = '<?php echo usbuilder()->getUrl("adminPageContentsList");?>&category=' + $('#categories').val();" class="btn_nor_01 btn_width_st1" title="Filter by selected condition">Filter</a>
        <div class="right_option" style="float:right;text-align:right">
			<form name="faqpia_search" class="faqpia_search" method="post" enctype="multipart/form-data" style="float:left">
				<span id="search_post" class="spn_search">
					<input type="text" title="Questions or answers" class="input_text" value="" id="keyword" maxlength="250" />
					<a href="#none" onclick="javascript: window.location.href = '<?php echo usbuilder()->getUrl("adminPageContentsList");?>&search=' + $('#keyword').val();" class="btn_nor_01 btn_width_st1" title="Filter by selected condition">Search</a>
				</span>
			</form>
			<p style="margin:20px 0 10px 0">
				<label for="show_html_value">Show rows</label>
				<select title="Number of rows" class="rows1" id="show_rows" onchange="javascript: adminPageContentsList.showRows(this.value);">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</p>
		</div>
        <br />
        <br />
        <table border="1" cellpadding="0" cellspacing="0" class="table_hor_02">
            <colgroup>
                <col width="44px" />
                <col width="44px" />
                <col />
                <col width="450px" />
                <col width="160px" />
            </colgroup>
            <thead>
               <tr>
                    <th class="chk"><input type="checkbox" class="input_chk chk_all" onchange="javascript: adminPageContentsList.checkAll(this);"/></th>
                    <th width="10px">No.</th>
                    <th width="200px"><a href="<?php echo usbuilder()->getUrl("adminPageContentsList") .'&sortby=category&sort='.$catClass1 ;?>" class="<?php echo $catClass;?>">Category</a></th>
                    <th><a href="<?php echo usbuilder()->getUrl("adminPageContentsList") .'&sortby=question&sort='.$catClass1 ;?>" class="<?php echo $questionClass;?>">Question</a></th>
                    <th width="150px"><a href="<?php echo usbuilder()->getUrl("adminPageContentsList") .'&sortby=status&sort='.$catClass1;?>" class="<?php echo $statusClass;?>">Status</a></th>
                    <th width="150px"><a href="<?php echo usbuilder()->getUrl("adminPageContentsList") .'&sortby=date_created&sort=' .$catClass1;?>" class="<?php echo $dateClass;?>">Date Posted</a></th>
                    <th width="150px"><a href="<?php echo usbuilder()->getUrl("adminPageContentsList") .'&sortby=date_modified&sort='.$catClass1;?>" class="<?php echo $datemodifiedClass;?>">Last Modified</a></th>
               </tr>
            </thead>
            <tbody>
                 <?php foreach ($aContentsList as $key => $val): ?>
                <tr class="event_mouse_over">
                   
                        <td><input type="checkbox" class="input_chk" name="checkThis" value="<?php echo $val['idx'];?>" /></td>
                        <td><?php echo $val['num'];?></td>
                        <td><?php echo $val['categories'];?></td>
                        <td><a href="<?php echo usbuilder()->getUrl("adminPageModifyContents"). '&idx=' . $val['idx']; ?>"  title="View Post"><?php echo $val['question'];?></a></td>
                        <td><?php echo $val['status'];?></td>
                        <td><?php echo $val['date_created'];?></td>
                        <td><?php echo $val['date_modified'];?></td>
                    
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <br />
        
        <div class="tbl_btom_rgt"><a href="<?php echo usbuilder()->getUrl("adminPageAddContents");?>" class="btn_nor_01 btn_width_st2" title="Add">Add</a></div>        
        <div class="pagination"><?php echo $sPagination;?></div>

    