<?php

namespace Mangini\DisableEmailPassword\XF\Service\User;

use XF\Entity\User;

class EmailChange extends XFCP_EmailChange
{
	public function canChangeEmail(&$error = null)
	{
		// have permission plus is on Public page
		if (!$this->user->hasPermission('generalPermissions', 'mg_edit_email')
			&& \XF::app() instanceof \XF\Pub\App)
		{
			return false;
		}
		
		$m = parent::canChangeEmail($error);
		return $m;
	}
}
