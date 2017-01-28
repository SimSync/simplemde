<?php

/**
 * @file
 * This file is loaded in the header of each page of your site.
 */

if(!defined('e107_INIT'))
{
	exit;
}

// [PLUGINS]/simplemde/languages/[LANGUAGE]/[LANGUAGE]_front.php
e107::lan('simplemde', false, true);


/**
 * Class simplemde_header.
 */
class simplemde_header
{

	/**
	 * Plugin preferences.
	 *
	 * @var array
	 */
	private $plugPrefs = array();

	/**
	 * Core preferences.
	 *
	 * @var array
	 */
	private $corePrefs = array();

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->plugPrefs = e107::getPlugConfig('simplemde')->getPref();
		$this->corePrefs = e107::getPref();

		// FIXME - load files only when editor is in use...
		if(check_class($this->corePrefs['post_html']))
		{
			$this->loadSimpleMDE();
		}
	}

	/**
	 * Load SimpleMDE files.
	 */
	public function loadSimpleMDE()
	{
		if(($library = e107::library('load', 'simplemde')) && !empty($library['loaded']))
		{
			e107::css('simplemde', 'css/simplemde.init.css');
			e107::js('simplemde', 'js/simplemde.init.js');
		}
	}

}


new simplemde_header();
