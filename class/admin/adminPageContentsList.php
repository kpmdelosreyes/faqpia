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

        $sSort = !$aArgs['sort'] || $aArgs['sort'] == '' || $aArgs['sort'] == 'asc' ? 'desc' : 'asc';
        $sQuestionClass = $aArgs['sortby'] == 'question' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sCategoryClass = $aArgs['sortby'] == 'category' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sDateClass = $aArgs['sortby'] == 'date_created' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sDateModifiedClass = $aArgs['sortby'] == 'date_modified' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sStatusClass = $aArgs['sortby'] == 'status' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        
                
        $oModelContents = new modelFaqContents();
        $aContentsList = $oModelContents->getContentsList($aOption);
        $iResultCount = $oModelContents->getResultCount($aOption);
  
        $aCount['total'] = $oModelContents->getResultCount(array());
        $aCountStatus = $oModelContents->getStatus(array());
        $aCountStatuspublished = $aCountStatus[1]['countStatus'] ? $aCountStatus[1]['countStatus'] : "0";
        $aCountStatusunpublished = $aCountStatus[0]['countStatus'] ? $aCountStatus[0]['countStatus'] : "0";
        
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
        $this->assign('published', $aCountStatuspublished);
        $this->assign('allpublished', $aStatusFilter1);
        $this->assign('allunpublished', $aStatusFilter);
        $this->assign('unpublished', $aCountStatusunpublished);
        $this->assign('catClass', $sCategoryClass);
        $this->assign('questionClass', $sQuestionClass);
        $this->assign('statusClass', $sStatusClass);
        $this->assign('dateClass', $sDateClass);
        $this->assign('datemodifiedClass', $sDateModifiedClass);
        $this->assign('catClass1', $sSort);

    	$this->importJS('default');
    	$this->view(__CLASS__);
    }

}
