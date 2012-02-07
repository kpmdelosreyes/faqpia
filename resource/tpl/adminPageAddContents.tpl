<!-- messagebox -->
<div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div>
<p class="require"><span class="neccesary">*</span> Required</p>
<!--  end of print Validation Message -->


<form name="faqpia_add" class="faqpia_add" method="post" enctype="multipart/form-data">
    <input type="hidden" id="categories" name="categories"><br />
        <table border="1" cellspacing="0" cellpadding="0" class="table_input_vr">
            <tr>
                <th style="width:150px;"><label for="clock_location1"><span class="neccesary">*</span>Question: </label></th>
                <td style="padding:0;"><input type="text" id="question" fw-filter="isFill" fw-label="question" name="question" class="fix"></td>
            </tr>
            <tr>
                <th><label for="clock_location1"><span class="neccesary">*</span>Answer: </label></th>
                <td><textarea id="answer" name="answer" fw-filter="isFill" fw-label="answer" style="height: 65px;"></textarea></td>
            </tr>
            <tr>
                <th>
                    <label for="Category">Category</label>
                    <span class="neccesary">*</span>
                </th>
                <td>
                    <span id="category_checked_wrapper">
                        <div id="category_wrap">
                            <input type="checkbox" name="category[]" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;margin-right:5px" value="1" />Our Services <br />
                            <input type="checkbox" name="category[]" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;margin-right:5px" value="2" />Our Products <br />
                            <input type="checkbox" name="category[]" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;margin-right:5px" value="3" />Account Management <br />
                            <input type="checkbox" name="category[]" class="category_checked" style="width: 12px; padding: 1px 5px 1px 15px; border: none;margin-right:5px" value="4" />Recruit
                        </div>
                    </span>
                </td>
            </tr>
            <tr>
                <th><label for="clock_location1">Status: </label></th>
                <td>
                    <select id="status" name="status" style="width:150px;">
                        <option value="0">Unpublished</option>
                        <option value="1">Published</option>
                    </select>
                </td>
            </tr>
        </table>
            <div>
                <p>
                    <span class="module_title" onclick="adminPageAddContents.displayOption('display_option');">Display Options </span>
                    <span id="pg_disqus_arrow" class="symb_style" onclick="adminPageAddContents.displayOption('display_option');"><img src="/_sdk/img/googlemaproutes/arrow_down.png" id="display_option_img" /></span>
                </p>
            </div>
            <div id="display_option">
                <table border="1" cellspacing="0" cellpadding="0" class="table_input_vr">
                    <tr>
                        <th style="width:150px;"><label for="clock_location1">Author: </label></th>
                        <td style="padding:0;"><input type="text" id="author" name="author" class="fix"></td>
                    </tr>
                </table>
            </div>
</form>
<br /><br />
<a href="javascript: void(0);" class="btn_apply" title="Save changes" onclick="javascript: adminPageAddContents.saveContents();">Save</a>
<a href="javascript: void(0);" class="add_link" title="Return to List" onclick="javascript: window.location.href = '/admin/sub/?module=FaqpiaPageContentsList';">Return to List</a>