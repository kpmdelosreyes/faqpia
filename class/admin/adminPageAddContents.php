<?php
class adminPageAddContents extends Controller_Admin
{
    protected function run($aArgs)
    {
        require_once 'builder/builderInterface.php';
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
        
        $sFormScript = usbuilder()->getFormAction('faqpia_add','adminExecContentSave');
        $this->writeJs($sFormScript);
        
        usbuilder()->validator(array('form' => 'simpleapp_add'));

        $this->importJS('faqpia');
        $this->view(__CLASS__);
    }
	
}
