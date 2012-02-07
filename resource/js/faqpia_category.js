$(document).ready(function(){
    
});

var adminPageAddCategory = {
    
    mostAction : function()
    {
    	window.location.href = usbuilder.getUrl("adminPageAddCategory");
    },
		
    saveCategory : function()
    {
    	if(oValidator.formName.getMessage('faqpia_addcategory'))
        {
            document.faqpia_addcategory.submit();
        }
        else{
            oValidator.generalPurpose.getMessage(false, "Field(s) with asterisk[*] are mandatory.");
        }
    }
}