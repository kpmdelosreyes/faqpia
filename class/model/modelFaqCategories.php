<?php 
class modelFaqCategories extends Model
{
	
    function getCategoryList($aOption)
    {
        $sQuery = "SELECT * FROM faqpia_categories";
        return $this->query($sQuery);

    }   
    
    function getCategory($aOption)
    {
    	$sQuery = "SELECT * FROM faqpia_categories";
    	return $this->query($sQuery);
    
    }
    
    function insertCategory($aData)
    {
    	$sQuery = "INSERT INTO faqpia_categories(category_name, category_status, category_description, date_created) VALUES('$aData[category_name]', '$aData[category_status]' , '$aData[category_description]',  " . time() . " ) ";
    	return $this->query($sQuery);
    }
}
