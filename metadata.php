<?php

/**
 *	@author:	a4p ASD / Andreas Dorner
 *	@company:	apps4print / page one GmbH, Nürnberg, Germany
 *
 *
 *	@version:	1.0.2
 *	@date:		09.03.2015
 *
 *
 *	metadata.php
 *
 *	apps4print - a4p_errorlog - display php errors in OXID eShop
 *
 */

// ------------------------------------------------------------------------------------------------
// apps4print
// ------------------------------------------------------------------------------------------------

$sMetadataVersion	= '1.0';

$aModule = array(
	'id'			=> 'a4p_errorlog', 
	'title'			=> 'apps4print - a4p_errorlog', 
	'description'	=> array(
		'de'									=> 'PHP-Fehler in OXID eShop anzeigen', 
		'en'									=> 'display php errors in OXID eShop' 
	), 
	'lang'			=> 'de', 
	'thumbnail'		=> 'out/img/apps4print/a4p_logo.jpg', 
	'version'		=> '<a4p_VERSION> (1.0.2)', 
	'author'		=> 'apps4print', 
	'url'			=> 'http://www.apps4print.com', 
	'email'			=> 'support@apps4print.com', 
	'extend'	  	=> array(
	), 
	'files'			=> array(
		'a4p_errorlog__admin'					=> 'apps4print/a4p_errorlog/controllers/admin/a4p_errorlog__admin.php'
	), 
	'blocks'		=> array(
	), 
	'settings'		=> array(
		array( 'group' => 'a4p_main',	'name' => 'a4p_errorlog__logfile_abs',	'type' => 'str',	'value' => '/var/log/httpd/error_log' )
	), 
	'templates'		=> array(
		'a4p_errorlog__admin_main.tpl'			=> 'apps4print/a4p_errorlog/views/admin/tpl/a4p_errorlog__admin_main.tpl'
	) 
);

// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
