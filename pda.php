<?php
/*
Plugin Name: Wordpress PDA & iPhone
Plugin URI: http://imthi.com/wp-pda/
Description: This plugin helps the users to view your blog in a pda and iPhone browser.
Author: Imthiaz Rafiq
Version: 1.3.1
Author URI: http://imthi.com/

SVN: $Id: pda.php 337028 2011-01-25 14:11:38Z imthiaz $

*/

class PDAPlugin {
	var $pda;
	var $smartPhone;
	
	function PDAPlugin() {
		$this->pda = false;
		$this->smartPhone = false;
		
		$defaultUserAgents = "Elaine/3.0, Android, iPhone, iPod, Palm, EudoraWeb, Blazer, AvantGo, Windows CE, Cellphone, Small, MMEF20, Danger, hiptop, Proxinet, ProxiNet, Newt, PalmOS, NetFront, SHARP-TQ-GX10, SonyEricsson, SymbianOS, UP.Browser, UP.Link, TS21i-10, MOT-V, portalmmm, DoCoMo, Opera Mini, Palm, Handspring, Nokia, Kyocera, Samsung, Motorola, Mot, Smartphone, Blackberry, WAP, SonyEricsson, PlayStation Portable, LG, MMP,OPWV, Symbian, EPOC";
		
		if (get_option ( 'pda_browser_agents' ) == false) {
			add_option ( 'pda_browser_agents', $defaultUserAgents );
		}
		
		if (get_option ( 'pda_version' ) === false) {
			update_option ( 'pda_version', $defaultUserAgents );
			add_option ( 'pda_version', '1.3' );
		}		
		
		add_action ( 'plugins_loaded', array (&$this, 'detectPDA' ) );
		add_action ( 'admin_menu', array (&$this, 'pdaAdminMenu' ) );
		add_filter ( 'theme_root', array (&$this, 'theme_root' ) );
		add_filter ( 'theme_root_uri', array (&$this, 'get_theme_root_uri' ) );
		add_filter ( 'stylesheet', array (&$this, 'get_stylesheet' ) );
		
		add_filter ( 'template', array (&$this, 'get_template' ) );
		add_filter ( 'option_template', array (&$this, 'get_template_directory' ) );
		add_filter ( 'option_stylesheet', array (&$this, 'get_template_directory' ) );
		
		add_filter ( 'previous_post_link', array (&$this, 'updatePreviousPostLink' ), 10, 2 );
		add_filter ( 'next_post_link', array (&$this, 'updateNextPostLink' ), 10, 2 );
	}
	
	function updatePreviousPostLink($format, $link) {
		if ($this->smartPhone) {
			return str_replace ( '<a ', '<a data-role="button" data-icon="arrow-l" data-iconpos="left" ', $format );
		}
		return $format;
	}
	
	function updateNextPostLink($format, $link) {
		if ($this->smartPhone) {
			return str_replace ( '<a ', '<a data-role="button" data-icon="arrow-r" data-iconpos="right" ', $format );
		}
		return $format;
	}
	
	function pdaAdminMenu() {
		if (function_exists ( 'add_submenu_page' )) {
			add_submenu_page ( 'plugins.php', __ ( 'PDA' ), __ ( 'PDA' ), 'manage_options', 'pda-options', array (&$this, 'pdaPluginOption' ) );
		}
	
	}
	
	function pdaPluginOption() {
		if (isset ( $_POST ['submit'] )) {
			if (function_exists ( 'current_user_can' ) && ! current_user_can ( 'manage_options' )) {
				die ( __ ( 'Cheatin&#8217; uh?' ) );
			}
			update_option ( 'pda_browser_agents', $_POST ['pda_browser_agents'] );
		}
		include_once ('pda-option.php');
	}
	
	function getBrowserAgentsToDetect() {
		$browserAgents = get_option ( 'pda_browser_agents' );
		if (! empty ( $browserAgents )) {
			$browserAgents = explode ( ',', $browserAgents );
			if (! empty ( $browserAgents )) {
				foreach ( $browserAgents as $key => $value ) {
					$browserAgents [$key] = trim ( $value );
				}
				return $browserAgents;
			}
		}
		return array ();
	}
	
	function detectPDA($query) {
		$browserAgent = $_SERVER ['HTTP_USER_AGENT'];
		$userAgents = $this->getBrowserAgentsToDetect ();
		foreach ( $userAgents as $userAgent ) {
			if (eregi ( $userAgent, $browserAgent )) {
				if (eregi ( "iphone", $browserAgent ) || eregi ( "ipod", $browserAgent ) || eregi ( "android", $browserAgent )) {
					$this->smartPhone = true;
				} else {
					$this->pda = true;
				}
			}
		}
	}
	
	function get_template_directory($value) {
		if ($this->pda) {
			return 'pda-theme';
		} elseif ($this->smartPhone) {
			return 'jqmobile-theme';
		} else {
			return $value;
		}
	}
	
	function theme_root($path) {
		$theme_root = dirname ( __FILE__ );
		if ($this->pda || $this->smartPhone) {
			return $theme_root;
		} else {
			return $path;
		}
	}
	
	function get_theme_root_uri($url) {
		if ($this->pda || $this->smartPhone) {
			return get_settings ( 'siteurl' ) . "/wp-content/plugins/wp-pda";
		} else {
			return $url;
		}
	}
	
	function get_stylesheet($stylesheet) {
		if ($this->pda) {
			return 'pda-theme';
		} elseif ($this->smartPhone) {
			return 'jqmobile-theme';
		} else {
			return $stylesheet;
		}
	}
	
	function get_template($template) {
		if ($this->pda) {
			return 'pda-theme';
		} elseif ($this->smartPhone) {
			return 'jqmobile-theme';
		} else {
			return $template;
		}
	}
	
}
$wp_pda = new PDAPlugin ();
