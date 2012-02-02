<?php
class adminExecContentUpdate extends Controller_AdminExec
{
	
    protected function run($aArgs)
    {
        require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);

        $oModelContents = new modelFaqContents();
        $bResult = $oModelContents->UpdateData($aArgs);

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