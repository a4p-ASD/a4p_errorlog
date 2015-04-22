<?php

/**
 *	@author:	a4p ASD / Andreas Dorner
 *	@company:	apps4print / page one GmbH, Nürnberg, Germany
 *
 *
 *	@version:	1.0.3
 *	@date:		22.04.2015
 *
 *
 *	a4p_errorlog__admin.php
 *
 *	apps4print - a4p_errorlog - display php errors in OXID eShop
 *
 */

// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------

class a4p_errorlog__admin extends oxAdminView {
	
	// ------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------
	
	
	protected $_sThisTemplate					= 'a4p_errorlog__admin_main.tpl';
	
	
	protected $s_logfile_abs					= null;
	
	protected $i_maxErrorCount					= 100;
	
	
	// ------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------
	
	public function get_logfile() {
		
		
		if ( is_null( $this->s_logfile_abs ) )
			$this->s_logfile_abs				= oxRegistry::getConfig()->getConfigParam( "a4p_errorlog__logfile_abs" );


		if ( $this->s_logfile_abs )
			return $this->s_logfile_abs;
		else
			return "";
	}

	// ------------------------------------------------------------------------------------------------
	
	public function check_logfile() {
		
		
		$this->get_logfile();
		
		if ( file_exists( $this->s_logfile_abs ) )
			return true;
		else
			return false;
	}

	// ------------------------------------------------------------------------------------------------
	
	public function _get_logfile_size() {
		
		
		$this->get_logfile();
		
		$i_filesize								= filesize( $this->s_logfile_abs );
		if ( $i_filesize !== false )
			return $i_filesize;
		else
			return false;		
	}

	// ------------------------------------------------------------------------------------------------
	
	public function get_logfile_size() {
		
		
		$i_filesize								= $this->_get_logfile_size();
		
		if ( $i_filesize !== false ) {
			
			$s_filesize							= $this->echo_filesize( $i_filesize );
			
		} else {
			
			$s_filesize							= "-leer-";

		}
		
		return $s_filesize;
	}
	
	// ------------------------------------------------------------------------------------------------
	
	public function get_anz_lines() {
	
		
		return $this->i_maxErrorCount;
	}
	
	// ------------------------------------------------------------------------------------------------
	
	protected function _read_logfile() {
		
		$a_content							= false;
		
		$this->get_logfile();

		if ( $this->check_logfile() ) {
			
			$a_content						= file( $this->s_logfile_abs );
			
			return $a_content;
		} else
			return false;
	}
	
	// ------------------------------------------------------------------------------------------------
	
	public function get_error_list() {
		
		$a_errorlist							= array();
	
		$a_content								= $this->_read_logfile();
	
		if ( $a_content ) {
	
			$a_rev								= array_reverse( $a_content );
	
			$i									= 0;

			foreach( $a_rev as $s_error ) {
				
				if( trim( $s_error  ) ) {
					
					$a_errorlist[]				= $this->_format_error( $s_error );
				}
	
				$i++;
	
				if ( $i > $this->i_maxErrorCount )
					break;
	
			}
		}
		
		return $a_errorlist;
	}
	
	// ------------------------------------------------------------------------------------------------
	
	protected function _format_error( $s_error ) {

		$s_datetime								= substr( $s_error, 0, 25 );
		$s_datetime								= str_replace( "[", "", $s_datetime );
		$s_datetime								= str_replace( "]", "", $s_datetime );
		$s_datetime								= trim( $s_datetime );
	
		$a_matches								= array();
		preg_match( "/] (.*)/", $s_error, $a_matches );
		$a_errors								= explode( ":  ", $a_matches[ 1 ] );
	
		$a_ret									= array();
		$a_ret[ "type" ]						= trim( $a_errors[0] );
		$a_ret[ "msg" ]							= trim( $a_errors[1] );
		$a_ret[ "datetime" ]					= $s_datetime;
		
		return $a_ret;
	}
	
	// ----------------------------------------------------------------------------------------------------------------
	
	public function echo_filesize( $size, $target_format = false ) {
		
		$a										= array( "Byte", "KB", "MB", "GB", "TB", "PB" );
		
		if ( $target_format ) {
			for( $i = 0, $pos = -1; $i < count( $a ); $i++, $pos++ ) {
				if ( strtoupper( $target_format ) != strtoupper( $a[ $i ] ) )
					$size						/= 1024;
				else
					$i							= count( $a );
			}
		} else {
			
			$pos								= 0;
			// while ($size >= 1024) {
			while( $size >= 1000 ) {
				// size /= 1024;
				$size							/= 1000;
				$pos++;
			}
		}
		
		return round( $size, 2 ) . " " . $a[ $pos ];
	}
	
	// ------------------------------------------------------------------------------------------------
	
}

// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
