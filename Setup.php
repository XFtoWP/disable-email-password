<?php

namespace Mangini\DisableEmailPassword;

use XF\AddOn\AbstractSetup;

class Setup extends AbstractSetup
{
	public function install(array $stepParams = [])
	{
		$this->applyGlobalPermission('generalPermissions', 'mg_edit_email');
		$this->applyGlobalPermission('generalPermissions', 'mg_edit_password');
	}

	public function upgrade(array $stepParams = [])
	{

	}

	public function uninstall(array $stepParams = [])
	{

	}
}