<?php
class adminPageAddContents extends Controller_Admin
{
    protected function run($aArgs)
    {
        require_once 'builder/builderInterface.php';
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
        
        $sFormScript = usbuilder()->getFormAction('fancybox_save','adminExecContentSave');
        $this->writeJs($sFormScript);
        
        usbuilder()->validator(array('form' => 'fancybox_save'));

        $this->importJS('faqpia');
        $this->view(__CLASS__);
    }
	
}
