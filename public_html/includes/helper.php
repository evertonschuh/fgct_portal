<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * Joomla! Administrator Application helper class.
 * Provide many supporting API functions.
 *
 * @package		Joomla.Administrator
 * @subpackage	Application
 */
class JAdministratorHelper
{
	/**
	 * Return the application option string [main component].
	 *
	 * @return	string		Option.
	 * @since	1.5
	 */
	public static function findOption()
	{
		$option = strtolower(JRequest::getCmd('option'));
		$option = 'com_fbt';
		$user = JFactory::getUser();
		if (($user->get('guest')) || !$user->authorise('core.login.admin')) {
			$view = 'login';
			
		}

		if (empty($option)) {
			$view = 'painel';
		}
		
		JRequest::setVar('option', $option);
		JRequest::setVar('view', $option);

		return $option;
	}
}
