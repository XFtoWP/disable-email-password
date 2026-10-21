<?php

namespace Mangini\DisableEmailPassword\XF\Service\User;

use Mangini\DisableEmailPassword\Framework;

class PasswordChange extends XFCP_PasswordChange
{
	public function isValid(&$error)
	{
		if ( !Framework::canEdit($this->user, 'mg_edit_password') )
		{
			$error = \XF::phrase('do_not_have_permission');
			
			return false;
		}
		
		return parent::isValid($error);
	}
}
