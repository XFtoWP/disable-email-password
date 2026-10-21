<?php

namespace Mangini\DisableEmailPassword\XF\Pub\Controller;

use XF\Mvc\Reply\View;

class Account extends XFCP_Account
{
	public function actionEmail()
	{
		if ( !\XF::visitor()->hasPermission('generalPermissions', 'mg_edit_email') )
		{
			$customUrl = $this->options()->mg_emailchange_custom_link;
			
			if ( !$customUrl )
				return $this->error(\XF::phrase('do_not_have_permission'));
			
			return $this->redirect($customUrl);
		}
		
		return parent::actionEmail();
	}
	
	public function actionSecurity()
	{
		$reply = parent::actionSecurity();
		
		# only show the password form to members who have a password and may change it
		if ( $reply instanceof View )
			$reply->setParam('hasPassword', $reply->getParam('hasPassword') && \XF::visitor()->hasPermission('generalPermissions', 'mg_edit_password'));
		
		return $reply;
	}
}
