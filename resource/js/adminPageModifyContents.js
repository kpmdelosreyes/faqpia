$(document).ready(function(){
    
});

var adminPageModifyContents = {
    
    mostAction : function()
    {
    	window.location.href = usbuilder.getUrl("adminPageModifyContents");";
    },
		
    saveContents : function()
    {
        if(oValidator.formName.getMessage('faqpia_modify'))
        {
            document.faqpia_modify.submit();
        }
        else{
            oValidator.generalPurpose.getMessage(false, "Field(s) with asterisk[*] are mandatory.");
        }

    }
}