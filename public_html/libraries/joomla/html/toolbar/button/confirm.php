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
 * Renders a standard button with a confirm dialog
 *
 * @package     Joomla.Platform
 * @subpackage  HTML
 * @since       11.1
 */
class JButtonConfirm extends JButton
{
	/**
	 * Button type
	 *
	 * @var    string
	 */
	protected $_name = 'Confirm';

	/**
	 * Fetch the HTML for the button
	 *
	 * @param   string   $type      Unused string.
	 * @param   string   $msg       Message to render
	 * @param   string   $name      Name to be used as apart of the id
	 * @param   string   $text      Button text
	 * @param   string   $task      The task associated with the button
	 * @param   boolean  $list      True to allow use of lists
	 * @param   boolean  $hideMenu  True to hide the menu on click
	 *
	 * @return  string   HTML string for the button
	 *
	 * @since   11.1
	 */
	public function fetchButton($type = 'Confirm', $msg = '', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		$text = JText::_($text);
		$msg = JText::_($msg, true);
		$class = $this->fetchIconClass($name);
		$doTask = $this->_getCommand($msg, $name, $task, $list);
		/*
		$html = "<a href=\"javascript:void(0);\" onclick=\"$doTask\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html .= "$text\n";
		$html .= "</a>\n";
	*/


		$html = "<a href=\"javascript:void(0);\" onclick=\"$doTask\" class=\"btn btn-danger shadow btn-circle btn-lg\" title=\"$text\">\n";
		$html .= "<i class=\"fas $class\"></i>\n";
		$html .= "</a>\n";

		/*
		$html = "<a href=\"javascript:void(0);\" onclick=\"$doTask\" class=\"quick-btn\">\n";
		$html .= "<i class=\"fa $class fa-2x\"></i>\n";
		$html .= "<span>$text</span>\n";*/
		//$html .= "<span class=\"label label-default\">2</span>\n";
		$html .= "</a>\n";

		return $html;
	}

	/**
	 * Get the button CSS Id
	 *
	 * @param   string   $type      Button type
	 * @param   object   $msg   	The message
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
	public function fetchId($type = 'Confirm', $msg = '', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		return $this->_parent->getName() . '-' . $name;
	}

	/**
	 * Get the JavaScript command for the button
	 *
	 * @param   object   $msg   The message to display.
	 * @param   string   $name  Not used.
	 * @param   string   $task  The task used by the application
	 * @param   boolean  $list  True is requires a list confirmation.
	 *
	 * @return  string  JavaScript command string
	 *
	 * @since   11.1
	 */
	protected function _getCommand($msg, $name, $task, $list)
	{
		JHtml::_('behavior.framework');
		$message = JText::_('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST');
		$message = addslashes($message);

		if ($list) {
			$cmd = "if (document.adminForm.boxchecked.value==0){Swal.fire({title:'Ação Necessária',text:'$message'});}else{Swal.fire({title:'Atenção',text:'$msg',icon:'warning',showCancelButton: true,confirmButtonColor: '#4e73df',cancelButtonColor: '#e74a3b',cancelButtonText: 'Desistir',confirmButtonText: 'Confirmar!'}).then((result) => {if (result.isConfirmed) {Joomla.submitbutton('$task');}});}";
		} else {
			$cmd = "Swal.fire({title: 'Atenção',text: '$msg',icon: 'warning',showCancelButton: true,confirmButtonColor: '#4e73df',cancelButtonColor: '#e74a3b',cancelButtonText: 'Desistir',confirmButtonText: 'Confirmar!'}).then((result) => {if (result.isConfirmed) {Joomla.submitbutton('$task');}});";
		}
		return $cmd;
	}
}