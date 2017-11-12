<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Pelican flight';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{

		//show the current user
		$this->load->library('session');
		 $role = $this->session->userdata('userrole');
		 $this->data['pagetitle'] .= ' ('. $role . ')';


		// Build the menubar
         $menu_data = $this->config->item('menu_choices');

		//add drop downlist checkmark for different user
		 if($role === ROLE_ADMIN){
                $menu_data['checkmark_admin'] = '&#10003;';
            }
            else{
                $menu_data['checkmark_admin'] = '';
            }
            if($role === ROLE_GUEST){
                $menu_data['checkmark_guest'] = '&#10003;';
            }
            else{
                $menu_data['checkmark_guest'] = '';
            }

			 $this->data['menubar'] = $this->parser->parse('_menubar', $menu_data, true);

		// use layout content if provided
		if (!isset($this->data['content']))
			$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->parser->parse($template, $this->data);
	}

}
