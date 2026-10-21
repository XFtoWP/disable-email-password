<?php

namespace Mangini\DisableEmailPassword\XF\Service\User;

use Mangini\DisableEmailPassword\Framework;

class EmailChange extends XFCP_EmailChange
{
	public function canChangeEmail(&$error = null)
	{
		if ( !Framework::canEdit($this->user, 'mg_edit_email') )
		{
			$error = \XF::phrase('do_not_have_permission');
			
			return false;
		}
		
		return parent::canChangeEmail($error);
	}
}
