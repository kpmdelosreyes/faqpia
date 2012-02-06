<?php
class adminExecSearchContent extends Controller_AdminExec
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
	
		usbuilder()->vd($aArgs);
		
		$oModelContents = new modelFaqContents();
		$bResult = $oModelContents->insertContents($aData);
	
	
		if ($bResult !== false) {
			usbuilder()->message('Saved succesfully', 'success');
		} else {
			usbuilder()->message('Save failed', 'warning');
		}
	
	
		$sUrl = usbuilder()->getUrl('adminPageContentsList');
		$sJsMove = usbuilder()->jsMove($sUrl);
		$this->writeJS($sJsMove);
	}
}