<?php 
class modelFaqCategories extends Model
{
	
    function getCategoryList()
    {
        $sQuery = "SELECT * FROM faqpia_categories";
        return $this->query($sQuery);

    }   
    
    function getCategory($aOption)
    {
    	$sQuery = "SELECT * FROM faqpia_categories WHERE idx=".$aOption[idx]; 
    	return $this->query($sQuery, "row");
    
    }
    
    function insertCategory($aData)
    {
    	$sQuery = "INSERT INTO faqpia_categories(category_name, category_status, category_description, date_created) VALUES('$aData[category_name]', '$aData[category_status]' , '$aData[category_description]',  " . time() . " ) ";
    	return $this->query($sQuery);
    }
    
    function deleteCategory($iDx)
    {
    	$sQuery = "Delete FROM faqpia_categories WHERE idx IN($iDx)";
    	return $this->query($sQuery);
    }
    
    
    function UpdateCategory($aData)
    {
    	$sQuery = "UPDATE faqpia_categories SET category_name ='".$aData[category_name]."', category_status = '".$aData[category_status]."' , category_description = '".$aData[category_description]."' , date_created = ". time() . " WHERE idx=".$aData['delete_category'];
    	return $this->query($sQuery);
    }
}
