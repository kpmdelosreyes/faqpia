<?php
class adminPageContentsList extends Controller_Admin
{
    protected function run($aArgs)
    {
        require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
                
        $iRows = 10;
        $iPage = $aArgs['page'] ? $aArgs['page'] : 1;
        $aOption['limit'] = $iRows;
        $aOption['offset'] = $iRows * ($iPage - 1);
        $aOption['category'] = $aArgs['category'] ? $aArgs['category'] : "";
        $status = ($aArgs['status'] == "Published") ? "1" : "00";
        $aOption['status'] = $aArgs['status'] ? $status : "";
        $aOption['search'] = $aArgs['search'] ? $aArgs['search'] : "";
        $aOption['sortby'] = $aArgs['sortby'] ? $aArgs['sortby'] : "";
        $aOption['sort'] = $aArgs['sort'] ? $aArgs['sort'] : "";

        $acatClass = ($aArgs['sort'] == "asc") ? "des" : "asc";
        $acatClass1 = ($aArgs['sort'] == "asc") ? "desc" : "asc";
        
        $oModelContents = new modelFaqContents();
        $aContentsList = $oModelContents->getContentsList($aOption);
        $iResultCount = $oModelContents->getResultCount($aOption);
  
        $aCount['total'] = $oModelContents->getResultCount(array());
        $aCountStatus = $oModelContents->getStatus(array());
        
        
        $sDateTimeFormat = 'm/d/Y';
        $i = 0;
        foreach($aContentsList as $key => $val)
        {
            $aContentsList[$key]['num'] = $iResultCount - $aOption['offset'] - $i;
            $aContentsList[$key]['date_created'] = date($sDateTimeFormat, $aContentsList[$key]['date_created']);
            $aContentsList[$key]['date_modified'] = date($sDateTimeFormat, $aContentsList[$key]['date_modified']);

            $aContentsList[$key]['status'] = ($aContentsList[$key]['status'] == "1") ? "Published" : "Unpublished";
            $aCategory = explode("," , $aContentsList[$key]['category']);
               
            foreach($aCategory as $value)
            {
                
                $sCategory .= ($value == "1") ? "Our Services <br />" : "";
                $sCategory .= ($value == "2") ? "Our Products <br />" :  ""; 
                $sCategory .= ($value == "3") ? "Account Management <br />" : "";
                $sCategory .= ($value == "4") ? "Recruit" : "";
            }
            $aContentsList[$key]['categories'] = $sCategory;
            $sCategory = "";
            $i++;
            
        }

        $this->assign('sPagination', usbuilder()->pagination($iResultCount, $iRows));
        $this->assign('aContentsList', $aContentsList);
        $this->assign('total', $aCount['total']);
        $this->assign('published', $aCountStatus[1]['countStatus']);
        $this->assign('allpublished', $aStatusFilter1);
        $this->assign('allunpublished', $aStatusFilter);
        $this->assign('unpublished', $aCountStatus[0]['countStatus']);
        $this->assign('catClass', $acatClass);
        $this->assign('catClass1', $acatClass1);

    	$this->importJS('default');
    	$this->view(__CLASS__);
    }

}
