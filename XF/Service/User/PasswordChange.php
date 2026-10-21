<?php

namespace Mangini\DisableEmailPassword\XF\Service\User;

class PasswordChange extends XFCP_PasswordChange
{
	// let's use this method to prevent globally the password to be changed
	public function isValid(&$error)
	{
		// if no permission plus the visitor is on Public page
		if (!$this->user->hasPermission('generalPermissions', 'mg_edit_password') 
			&& \XF::app() instanceof \XF\Pub\App)
		{
			$error[] = \XF::phrase('do_not_have_permission')->__toString();
			return false;
		}

		$m = parent::isValid($error);
		return $m;
	}
}