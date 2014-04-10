<?php

/**
 *	@author:	a4p ASD / Andreas Dorner
 *	@company:	apps4print / page one GmbH, Nürnberg, Germany
 *
 *
 *	@version:	1.0.0
 *	@date:		09.04.2014
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

$sMetadataVersion = '1.0';

$aModule = array(
	'id'			=> 'a4p_errorlog',
	'title'			=> 'apps4print - a4p_errorlog',
	'description'	=> array(
		'de'					=> 'apps4print a4p_errorlog', 
		'en'					=> 'apps4print a4p_errorlog'
	),
	'lang'			=> 'de',
	'thumbnail'		=> 'out/img/apps4print/a4p_logo.jpg',
	'version'		=> '<a4p_VERSION> (1.0.0)',
	'author'		=> 'apps4print',
	'url'			=> 'http://www.apps4print.com',
	'email'			=> 'support@apps4print.com',
	'extend'	  	=> array(
	),
	'files'			=> array(
		'a4p_errorlog'							=> 'apps4print/a4p_errorlog/application/controllers/admin/a4p_errorlog.php'
	),
	'blocks'		=> array(
	),
	'settings'		=> array(
		array( 'group' => 'main',	'name' => 'a4p_logfile_abs',	'type' => 'str',	'value' => '/var/log/httpd/errorlog' )
	),
	'templates'		=> array(
		'a4p_errorlog.tpl'						=> 'apps4print/a4p_errorlog/application/views/admin/tpl/a4p_errorlog.tpl'
	)
);

// ------------------------------------------------------------------------------------------------
// apps4print
// ------------------------------------------------------------------------------------------------
