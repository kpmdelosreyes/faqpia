<?php

class frontPagecontentsDetail extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		
		$oModelContents = new modelFaqContents();
        $aList = $oModelContents->getAnswer($aArgs['idx']);
       	
		$this->loopFetch($aList);
	
	}
}




