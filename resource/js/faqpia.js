$(document).ready(function(){
    
});

var adminPageAddContents = {
    
    mostAction : function()
    {
    	window.location.href = usbuilder.getUrl("adminPageAddContents");
    },
		
    saveContents : function()
    {
        if(oValidator.formName.getMessage('faqpia_add'))
        {
            document.faqpia_add.submit();
        }
        else{
            oValidator.generalPurpose.getMessage(false, "Field(s) with asterisk[*] are mandatory.");
        }

    }
}