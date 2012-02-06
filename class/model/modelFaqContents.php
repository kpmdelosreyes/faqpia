<?php
class modelFaqContents extends Model
{
	
    function getContentsList($aOption)
    {
        $sQuery = "SELECT * FROM faqpia_contents";
        
        if($aOption['search'] != false)
        {
        	$sQuery .= " WHERE question LIKE '%".$aOption[search]."%' OR answer LIKE '%".$aOption[search]."%' ";
        }
        if($aOption['status'] != false)
        {
        	$sQuery .= " WHERE status =".$aOption[status];
        }
        if($aOption['category'] != false)
        {
        	$sQuery .= " WHERE category LIKE '%".$aOption[category]."%' ";
        }
        if ($aOption['sortby']) {
        	$sQuery .= " ORDER BY $aOption[sortby] $aOption[sort]";
        }

        if ($aOption['limit']) {
                $sQuery .= " LIMIT $aOption[offset], $aOption[limit]";
        }

        return $this->query($sQuery);

    }
    
    
    function insertContents($aData)
    {
        $sQuery = "INSERT INTO faqpia_contents (category, question, answer, author, status, date_created, date_modified) 
                    VALUES('$aData[category]', '$aData[question]' , '$aData[answer]', '$aData[author]' , '$aData[status]', " . time() . ", " . time() . " )";
       
        return $this->query($sQuery);
    }

    function getResultCount($aOption)
    {
        $sQuery = "SELECT count(*) as count FROM faqpia_contents";
        $mResult = $this->query($sQuery);
        return $mResult[0]['count'];
    }
    
    function getStatus($aOption)
    {
        $sQuery = "SELECT status, count(question) as countStatus FROM faqpia_contents GROUP BY status";
        return $this->query($sQuery);
  
    }
    
    function deleteContents($sIdx)
    {
    	$rest = substr($sIdx, 0,-1);
        $sQuery = "Delete FROM faqpia_contents WHERE idx IN($rest)";
        return $this->query($sQuery);
    }
    
    function setPublish($sIdx)
    {
    	$rest = substr($sIdx, 0,-1);
    	$sQuery = "UPDATE faqpia_contents SET status = '1', date_modified = ". time() . " WHERE idx IN($rest)";
    	return $this->query($sQuery);
    }
    
    function setUnpublish($sIdx)
    {
    	$rest = substr($sIdx, 0,-1);
    	$sQuery = "UPDATE faqpia_contents SET status = '0', date_modified = ". time() . " WHERE idx IN($rest)";
    	return $this->query($sQuery);
    }


    function getIdx($idx)
    {
        $sQuery = "SELECT * FROM faqpia_contents WHERE idx =".$idx;
        return $this->query($sQuery, "row");
    }
    
    function UpdateData($aData)
    {
        $sQuery = "UPDATE faqpia_contents SET category ='".$aData[category]."', question = '".$aData[question]."' , answer = '".$aData[answer]."' , author = '".$aData[author]."', status = '".$aData[status]."',
                   date_modified = ". time() . " WHERE idx=".$aData['idx'];

        return $this->query($sQuery);
    }
   
}