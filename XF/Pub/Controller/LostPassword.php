<?php

namespace Mangini\DisableEmailPassword\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class LostPassword extends XFCP_LostPassword
{
	public function actionIndex()
	{
		$options = $this->options();
		
		if ( $options->mg_disable_resetpassword_login )
			return $this->error(\XF::phrase('do_not_have_permission'));
		
		if ( $options->mg_forgotpassword_custom_link )
			return $this->redirect($options->mg_forgotpassword_custom_link);
		
		return parent::actionIndex();
	}
	
	# reset links that were emailed before password reset was disabled stop working too
	public function actionConfirm(ParameterBag $params)
	{
		if ( $this->options()->mg_disable_resetpassword_login )
			return $this->error(\XF::phrase('do_not_have_permission'));
		
		return parent::actionConfirm($params);
	}
}
