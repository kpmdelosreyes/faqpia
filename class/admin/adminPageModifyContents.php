<?php
class adminPageModifyContents extends Controller_AdminExec
{
    protected function run($aArgs)
    {
        require_once 'builder/builderInterface.php';
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);

        $sFormScript = usbuilder()->getFormAction('faqpia_modify','adminExecContentUpdate');
        $this->writeJs($sFormScript);

        usbuilder()->validator(array('form' => 'faqpia_modify'));
        $oModelContents = new modelFaqContents();
        $aResult = $oModelContents->getIdx($aArgs['idx']);
        
        $aCategory = explode("," , $aResult['category']);
        
        $this->assign("category", $aCategory);
        $this->assign("data", $aResult);
        $this->importJS('default');
        $this->view(__CLASS__);
    }

}
