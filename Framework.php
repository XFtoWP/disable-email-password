<?php

namespace Mangini\DisableEmailPassword;

class Framework
{
	/**
	 * The restrictions apply on the public site and the REST API. Admins can
	 * still change any user's email or password from the admin panel.
	 */
	public static function isRestrictedApp()
	{
		$app = \XF::app();
		
		return $app instanceof \XF\Pub\App || $app instanceof \XF\Api\App;
	}
	
	public static function canEdit(\XF\Entity\User $user, $permission)
	{
		return !self::isRestrictedApp() || $user->hasPermission('generalPermissions', $permission);
	}
}
