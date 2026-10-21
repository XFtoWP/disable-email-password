<?php

namespace Mangini\DisableEmailPassword\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\AbstractReply;

class LostPassword extends XFCP_LostPassword
{
	public function actionIndex()
	{
		$custom_url = \XF::app()->options()->mg_forgotpassword_custom_link;
		$disabled = \XF::app()->options()->mg_disable_resetpassword_login;
		
		if ($disabled)
		{
			return $this->error(\XF::phrase('do_not_have_permission'));
		}
		
		if (!$custom_url && !$disabled)
		{
			return parent::actionIndex();
		}
		
		if ($custom_url)
		{
			header('Location: ' . $custom_url);
			die();
		}
		else
		{
			return $this->error(\XF::phrase('do_not_have_permission'));
		}			
	}
}