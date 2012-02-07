<?php
class frontPagePagination extends Controller_Front
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
	
		$sClass = $iPage ? "current" : "next";
		
		$oModelContents = new modelFaqContents();
		$aList = $oModelContents->getContentsList($aOption);
		$iResultCount = $oModelContents->getResultCount($aOption);
	
		$aCount['total'] = $oModelContents->getResultCount(array());
	
		//usbuilder()->pagination($iResultCount, $iRows)
		$sTotal = $iResultCount - $iRows;
	
		$this->assign('sPageURL', usbuilder()->getUrl("frontPagecontentsList").'?page='.$iPage);
		$this->assign('sPageIndex' ,$sTotal);
		$this->assign('sPageClass' , $sClass);
	
	}
	
}