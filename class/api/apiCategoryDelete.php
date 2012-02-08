<?php
class apiCategoryDelete extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
	 	usbuilder()->init($this->Request->getAppID(), $aArgs);

		$oModelContents = new modelFaqCategories();
		$bResult = $oModelContents->deleteCategory($aArgs[idx]);
		
	}
	
}