<?php

/**
 * @package     Joomla.Platform
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Renders a standard button
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JButtonStandard extends JButton
{
	/**
	 * Button type
	 *
	 * @var    string
	 */
	protected $_name = 'Standard';

	/**
	 * Fetch the HTML for the button
	 *
	 * @param   string   $type  Unused string.
	 * @param   string   $name  The name of the button icon class.
	 * @param   string   $text  Button text.
	 * @param   string   $task  Task associated with the button.
	 * @param   boolean  $list  True to allow lists
	 *
	 * @return  string  HTML string for the button
	 *
	 * @since   11.1
	 */
	public function fetchButton($type = 'Standard', $name = '', $text = '', $task = '', $list = true)
	{
		$i18n_text = JText::_($text);
		$class = $this->fetchIconClass($name);
		$doTask = $this->_getCommand($text, $task, $list);

		//$html = "<a href=\"javascript:void(0);\" onclick=\"$doTask\">\n";
		//$html .= "<span class=\"btn btn-primary  btn-circle btn-lg \" title=\"$i18n_text\">\n";
		//$html .= "<i class=\"fas $class align-items-center\"></i>\n";
		//$html .= "</span>\n";
		//$html .= "<span>$i18n_text</span>\n";
		//$html .= "</a>\n";

		$html = "<a href=\"javascript:void(0);\" onclick=\"$doTask\" class=\"btn btn-primary shadow btn-circle btn-lg\" title=\"$i18n_text\">\n";
		$html .= "<i class=\"fas $class\"></i>\n";
		$html .= "</a>\n";
		//$html .= "<span class=\"label label-default\"></span>\n";

		return $html;
	}

	/**
	 * Get the button CSS Id
	 *
	 * @param   string   $type      Unused string.
	 * @param   string   $name      Name to be used as apart of the id
	 * @param   string   $text      Button text
	 * @param   string   $task      The task associated with the button
	 * @param   boolean  $list      True to allow use of lists
	 * @param   boolean  $hideMenu  True to hide the menu on click
	 *
	 * @return  string  Button CSS Id
	 *
	 * @since   11.1
	 */
	public function fetchId($type = 'Standard', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		return $this->_parent->getName() . '-' . $name;
	}

	/**
	 * Get the JavaScript command for the button
	 *
	 * @param   string   $name  The task name as seen by the user
	 * @param   string   $task  The task used by the application
	 * @param   boolean  $list  True is requires a list confirmation.
	 *
	 * @return  string   JavaScript command string
	 *
	 * @since   11.1
	 */
	protected function _getCommand($name, $task, $list)
	{
		JHtml::_('behavior.framework');
		$message = JText::_('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST');
		$message = addslashes($message);

		if ($list) {
			$cmd = "if (document.adminForm.boxchecked.value==0){Swal.fire({title:'Ação Necessária',text:'$message'});}else{ Joomla.submitbutton('$task')}";
		} else {
			$cmd = "Joomla.submitbutton('$task')";
		}

		return $cmd;
	}
}