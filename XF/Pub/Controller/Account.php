<?php

namespace Mangini\DisableEmailPassword\XF\Pub\Controller;

use XF\Mvc\Entity\ArrayCollection;
use XF\Mvc\ParameterBag;
use XF\Mvc\FormAction;
use XF\Mvc\Reply\View;

class Account extends XFCP_Account
{
	public function actionEmail()
	{
		if (!\XF::visitor()->hasPermission('generalPermissions', 'mg_edit_email'))
		{
			$custom_url = \XF::app()->options()->mg_emailchange_custom_link;
			if (!$custom_url)
			{
				return $this->error(\XF::phrase('do_not_have_permission'));
			}
			else
			{
				header('Location: ' . $custom_url);
				die();
			}
		}
		
		$m = parent::actionEmail();
		return $m;
	}
	
	public function actionSecurity()
	{
		$u = \XF::visitor();
		
		$m = parent::actionSecurity();
		
		if (method_exists($m, 'setParam'))
		{
			$m->setParam('hasPassword', $u->hasPermission('generalPermissions', 'mg_edit_password'));
		}
		
		return $m;
	}	
}