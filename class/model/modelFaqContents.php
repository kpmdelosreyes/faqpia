<?php
class modelFaqContents extends Model
{
	
    function getContentsList($aOption)
    {
        $sQuery = "SELECT * FROM faqpia_contents ORDER BY date_created DESC";

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


    function deleteContents($sIdx)
    {

        $sQuery = "Delete FROM faqpia_contents WHERE idx IN($sIdx)";
        return $this->query($sQuery);

    }

    function getList()
    {
        $sQuery = "SELECT * FROM faqpia_contents";
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
                  date_created= ". time() . ", date_modified = ". time() . " WHERE idx=".$aData['idx'];

        return $this->query($sQuery);
    }
   
}