$(document).ready(function(){
    
});

var adminPageContentsList = {
    
    mostAction : function()
    {
        window.location.href = usbuilder.getUrl("faqpiaPageAddContents");
    },


    checkAll : function(selector)
    {
    	if ($(selector).is(":checked") === true){
			$.browser.msie ? $(".event_mouse_over input:checkbox").prop("checked", "checked") : $(".event_mouse_over input:checkbox").attr("checked", "checked");
		}
		else {
			$.browser.msie ? $(".event_mouse_over input:checkbox").removeProp("checked") : $(".event_mouse_over input:checkbox").removeAttr("checked");
		}
    },
    
    apply : function()
    {
    	
    	alert($("#categories").val());
    }

}