<?php

class frontPagecontentsList extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$iRows = 10;
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);
		$aOption['category'] = $aArgs['category'] ? $aArgs['category'] : "";
		$aOption['search'] = $aArgs['search'] ? $aArgs['search'] : "";
		
		$oModelContents = new modelFaqContents();
        $aList = $oModelContents->getContentsList($aOption);
        $iResultCount = $oModelContents->getResultCount($aOption);
  
        $aCount['total'] = $oModelContents->getResultCount(array());
		
	
		$this->loopFetch($aList);
	
	}
}




