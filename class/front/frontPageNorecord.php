<?php
class frontPageNorecord extends Controller_Front
{
	
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$connectDB = new modelFaqContents();
		$aList = $connectDB->getContentsList(null);
		
		if($aList > 0) $this->fetchClear();
		
		
	}
}