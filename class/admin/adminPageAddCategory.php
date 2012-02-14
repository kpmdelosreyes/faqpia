<?php
class adminPageAddCategory extends Controller_Admin
{
    protected function run($aArgs)
    {
        require_once 'builder/builderInterface.php';
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
        
        $sFormScript = usbuilder()->getFormAction('faqpia_addcategory','adminExecCategorySave');
        $this->writeJs($sFormScript);
        
        usbuilder()->validator(array('form' => 'faqpia_addcategory'));
        
        $oModelContents = new modelFaqCategories();
        $aCategoryList = $oModelContents->getCategoryList();
        
        $this->assign('aCategoryList', $aCategoryList);
        
        $this->importCSS('default');
        $this->importJS('faqpia_category');
     
        $this->view(__CLASS__);
    }
	
}
