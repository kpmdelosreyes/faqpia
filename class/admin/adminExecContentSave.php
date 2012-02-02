<?php

class adminExecContentSave extends Controller_AdminExec
{
    protected function run($aArgs)
    {
        require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);

        $aData['category'] = implode("," , $aArgs['category']);
        $aData['question'] = $aArgs['question'];
        $aData['answer'] = $aArgs['answer'];
        $aData['status'] = $aArgs['status'];
        $aData['author'] = $aArgs['author'];
        $aData['date_created'] = time();
        $aData['date_modified'] = time();
       
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
