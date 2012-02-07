<?php
class adminPageCategoryList extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$oModelContents = new modelFaqCategories();
		$aCategoryList = $oModelContents->getCategoryList($aOption);
		
		$this->assign('aCategoryList', $aCategoryList);
		
		$this->importCSS('default');
		$this->importJS('faqpiaList');
		$this->view(__CLASS__);
	}
}