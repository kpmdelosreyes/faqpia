<?php
class adminPageCategoryList extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$sFormScript = usbuilder()->getFormAction('faqpia_modifycategory','adminExecCategoryUpdate');
		$this->writeJs($sFormScript);
		
		usbuilder()->validator(array('form' => 'faqpia_modifycategory'));
		
		$aOption['idx'] = $aArgs['idx'] ? $aArgs['idx'] : "1";
		
		$oModelContents = new modelFaqCategories();
		$aCategoryList = $oModelContents->getCategoryList();
		$aCategory = $oModelContents->getCategory($aOption);
		
		$this->assign('aCategory', $aCategory);
		$this->assign('aCategoryList', $aCategoryList);
		
		$this->importCSS('default');
		$this->importJS('faqpiaList');
		$this->view(__CLASS__);
	}
}