<?php
class frontPagePagination extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
	
		$iRows = $aArgs['category'] ? 5 : 10;
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);
		
		$aOption['category'] = $aArgs['category'] ? $aArgs['category'] : "";
		$aOption['search'] = $aArgs['search'] ? $aArgs['search'] : "";
	
		$oModelContents = new modelFaqContents();
		$aList = $oModelContents->getQuestion($aOption);
		$iResultCount = $oModelContents->getCount($aOption);
		
		$uri = preg_replace('/.page=+.[^\?&]*/','',$_SERVER["REQUEST_URI"]);
        $connector = strpos($_SERVER["SERVER_NAME"].$uri, '?') !== false ? '&' : '?';
        $href = $uri.$connector."page=";
        
        $prev = $iPage - 1;
        $next = $iPage + 1;
        
		$sTotal = ceil($iResultCount / $iRows);
		$sPagination = array();
		if($iPage > 1)
            $sPagination[] = array('sPageUrl' => $href.$prev, 'sPage' => 'prev');
		
		for($i=1; $i<=$sTotal; $i++)
		{
			$sPagination[] = array('sPage' => $i,
								   'sPageUrl' => $href.$i,
								   'sPageClass' => ($i == $iPage) ? "current" : "num"
			);
		}
		
		if($iPage < $sTotal)
            $sPagination[] = array('sPageUrl' => $href.$next, 'sPage' => 'next');
		
	
		if($aList)
		{
			$this->loopFetch($sPagination);
		}
		else
		{
			$this->fetchClear();
			
		}
		
	
	}
	
}