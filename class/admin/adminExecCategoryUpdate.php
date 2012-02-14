<?php
class adminExecCategoryUpdate extends Controller_AdminExec
{
	
    protected function run($aArgs)
    {
        require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
//usbuilder()->vd($aArgs);return;
        $oModelContents = new modelFaqCategories();
        $bResult = $oModelContents->UpdateCategory($aArgs);

        if ($bResult !== false) {
            usbuilder()->message('Saved succesfully', 'success');
        } else {
            usbuilder()->message('Save failed', 'warning');
        }

        $sUrl = usbuilder()->getUrl('adminPageCategoryList');
        $sJsMove = usbuilder()->jsMove($sUrl);
        $this->writeJS($sJsMove);
    }
}