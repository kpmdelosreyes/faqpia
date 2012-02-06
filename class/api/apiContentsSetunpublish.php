<?php
class apiContentsSetunpublish extends Controller_Api
{

	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this->Request->getAppID(), $aArgs);

		$oModelContents = new modelFaqContents();
		$bResult = $oModelContents->setUnpublish($aArgs[idx]);

	}

}