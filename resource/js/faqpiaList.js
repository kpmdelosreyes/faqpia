$(document).ready(function(){
	
	$("#delete").click(function(){
		popup.load('faqpia_deletethis_popup_contents').skin('admin').layer({'title' : 'Delete','width' : 300});
	});
	
	$("#most_action_category").live("click", function(){
		window.location.href = usbuilder.getUrl("adminPageAddCategory");
	});
	
});

var adminPageCategoryList = {
    
    mostAction : function()
    {
        window.location.href = usbuilder.getUrl("adminPageAddCategory");
    },
    
    deleteThis: function()
    {
    	popup.close('faqpia_deletethis_popup_contents');
		var idx = $("#delete_category").val();
		$.ajax({
			type: "POST",
			url: usbuilder.getUrl("apiCategoryDelete"),
			data : {idx : idx}
		}).done(function( result ) {  
            oValidator.generalPurpose.getMessage(true, "Deleted successfully"); 
            window.location.href = usbuilder.getUrl("adminPageCategoryList");
        });
    },
    
    saveModifiedcategory : function()
    {
    	if(oValidator.formName.getMessage('faqpia_modifycategory'))
        {
            document.faqpia_modifycategory.submit();
        }
        else{
            oValidator.generalPurpose.getMessage(false, "Fill all fields");
        }
    }


    
}