<!-- messagebox -->
<div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><p class="require"><span class="neccesary">*</span> Required</p>

<form name="faqpia_modify" class="faqpia_modify" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idx" value="<?php echo $data['idx'];?>">
    <input type="hidden" id="categories" name="categories">
    <br />
    <table border="1" cellspacing="0" cellpadding="0" class="table_input_vr">
      
        <tr>
            <th style="width:150px;"><label for="clock_location1"><span class="neccesary">*</span>Question: </label></th>
            <td style="padding:0;"><input type="text" id="question" fw-filter="isFill" fw-label="question" name="question" class="fix" value="<?php echo $data['question'];?>"></td>
        </tr>
        <tr>
            <th><label for="clock_location1"><span class="neccesary">*</span>Answer: </label></th>
            <td><textarea id="answer" name="answer" fw-filter="isFill" fw-label="answer" style="height: 65px;"><?php echo $data['answer'];?></textarea></td>
        </tr>
        <tr>
            <th>
                <label for="Category">Category</label>
                    <span class="neccesary">*</span>
            </th>
        <td>
            <span id="category_checked_wrapper">
                <div id="category_wrap">
                 
                    <input type="checkbox" name="category" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;" value="1"  <?php foreach ($category as $key => $val) { if($val == 1) echo "checked";  } ?> />Our Services <br />
                    <input type="checkbox" name="category" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;" value="2"  <?php foreach ($category as $key => $val) { if($val == 2) echo "checked";  } ?>/>Our Products <br />
                    <input type="checkbox" name="category" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;" value="3"  <?php foreach ($category as $key => $val) { if($val == 3) echo "checked";  } ?>/>Account Management <br />
                    <input type="checkbox" name="category" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;" value="4"  <?php foreach ($category as $key => $val) { if($val == 4) echo "checked";  } ?> />Recruit
                </div>
            </span>
        </td>
        </tr>
        <tr>
            <th><label for="clock_location1">Status: </label></th>
            <td>
                <select id="status" name="status" style="width:150px;">
                    <option value="0" <?php if($data['status'] == 0) echo "selected";  ?>>Unpublished</option>
                    <option value="1" <?php if($data['status'] == 1) echo "selected";   ?>>Published</option>
                </select>
            </td>
        </tr>
    </table>
    <div>
        <p>
            <span class="module_title" onclick="adminPageQuestionEdit.displayOption('display_option');">Display Options </span>
            <span id="pg_disqus_arrow" class="symb_style" onclick="adminPageQuestionEdit.displayOption('display_option');"><img src="/_sdk/img/googlemaproutes/arrow_down.png" id="display_option_img" /></span>
        </p>
    </div>
    <div id="display_option">
        <table border="1" cellspacing="0" cellpadding="0" class="table_input_vr">
            <tr>
                    <th style="width:150px;"><label for="clock_location1">Author: </label></th>
                    <td style="padding:0;"><input type="text" id="author" name="author" value="<?php echo $data['author'];?>" class="fix"></td>
            </tr>
        </table>
    </div>
</form>
<br /><br />

<a href="javascript: void(0);" class="btn_apply" title="Save changes" onclick="javascript: adminPageModifyContents.saveContents();">Save</a>
<a href="javascript: void(0);" class="add_link" title="Return to List" onclick="javascript: window.location.href = '/admin/sub/?module=FaqpiaPageContentsList';">Return to List</a>



