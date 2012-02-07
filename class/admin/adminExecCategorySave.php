<?php

class adminExecCategorySave extends Controller_AdminExec
{
    protected function run($aArgs)
    {
        require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);

        $aData['category_name'] = $aArgs['category_name'];
        $aData['category_status'] = $aArgs['category_status'];
        $aData['category_description'] = $aArgs['category_description'];
        $aData['date_created'] = time();
  
       
        $oModelContents = new modelFaqCategories();
        $bResult = $oModelContents->insertCategory($aData);


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
