<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');


class EASistemasViewPayment extends JView 
{
	public function display($tpl = null)
	{	
	
	

		JRequest::setVar('tmpl','pdf');
		$this->cobranca = $this->get( 'Cobranca' );

		parent::display($tpl);	
	}

}


