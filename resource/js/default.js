$(document).ready(function(){
	
});

var adminPageContentsList = {
    
    mostAction : function()
    {
        window.location.href = usbuilder.getUrl("adminPageAddContents");
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
         var actions = $('#actions').val();
         
         var fields = $(".input_chk").serializeArray();
		 var idx = "";
		 $.each(fields,function(i,field){
			idx += field.value + ",";
		 });
		 
         if(actions == '1')
         {
        	
        	 $.ajax({
     			type: "POST",
     			url: usbuilder.getUrl("apiContentsSetpublish"),
     			data : {idx : idx}
     		 }).done(function( result ) {  
                 oValidator.generalPurpose.getMessage(true, "Published successfully"); 
                 window.location.href = usbuilder.getUrl("adminPageContentsList");
             });
         }
         else if(actions == '2')
    	 {
        	        	 
        	 $.ajax({
     			type: "POST",
     			url: usbuilder.getUrl("apiContentsSetunpublish"),
     			data : {idx : idx}
     		 }).done(function( result ) {  
                 oValidator.generalPurpose.getMessage(true, "Unpublished successfully"); 
                 window.location.href = usbuilder.getUrl("adminPageContentsList");
             });
    	 }
         else if(actions == '3')
    	 {
        	 popup.load('faqpia_delete_popup_contents').skin('admin').layer({'title' : 'Delete','width' : 300});
    	 }
         else
         {
        	 oValidator.generalPurpose.getMessage(false, "No item(s) selected.");
         }
    },
    
    deleteCheckedvalues : function()
	{
		popup.close('faqpia_delete_popup_contents');
		var actions = $('#actions').val();
		
		 var fields = $(".input_chk").serializeArray();
		 var idx = "";
		 $.each(fields,function(i,field){
			idx += field.value + ",";
		 });
		
		$.ajax({
			type: "POST",
			url: usbuilder.getUrl("apiContentsDelete"),
			data : {idx : idx}
		}).done(function( result ) {  
            oValidator.generalPurpose.getMessage(true, "Deleted successfully"); 
            window.location.href = usbuilder.getUrl("adminPageContentsList");
        });

	}
}