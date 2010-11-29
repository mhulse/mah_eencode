<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Eencode',
	'pi_version' => '2.0',
	'pi_author' => 'Micky Hulse',
	'pi_author_url' => 'http://hulse.me/',
	'pi_description' => '[Expression Engine 2.0] Eencode: [PHP5] Encoding plugin.',
	'pi_usage' => Mah_eencode::usage()
);

/**
 * Mah_eencode Class
 * 
 * @package         ExpressionEngine
 * @category        Plugin
 * @author          Micky Hulse
 * @link            http://hulse.me/
 */

class Mah_eencode {
	
	public $return_data = '';
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	
	function Mah_eencode($str = '')
	{
		
		// ----------------------------------
		// Call super object:
		// ----------------------------------
		
		$this->EE =& get_instance();
		
		// ----------------------------------
		// Get parameter(s):
		// ----------------------------------
		
		$protect = ($this->EE->TMPL->fetch_param('protect') !== 'yes') ? TRUE : FALSE;
		$decode = ($this->EE->TMPL->fetch_param('decode') === 'yes') ? TRUE : FALSE;
		
		// ----------------------------------
		// Passing data directly:
		// ----------------------------------
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
		
		// ----------------------------------
		// Sanitize/clean string:
		// ----------------------------------
		
		// For PHP 5.2.3 or greater:
		$str = ($decode === TRUE) ? html_entity_decode($str, ENT_COMPAT, 'UTF-8') : htmlentities($str, ENT_COMPAT, 'UTF-8', $protect);
		
		// ----------------------------------
		// Return:
		// ----------------------------------
		
		$this->return_data = trim($str);
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	
	public function usage()
	{
		
		ob_start();
		
		?>
		
		About:
		
		     Convert all applicable characters to HTML entities.
		
		-----
		
		Requirements:
		
		     * ExpressionEngine 2.0
		     * PHP 5.2.3 or greater
		
		-----
		
		Parameters:
		
		     "protect"
		          Default: Existing html entities will not be encoded.
		          Set to "yes" and everything will be converted.
		          Not applicable when parameter "decode" is set to "yes".
		
		     "decode"
		          Set to "yes" to convert all HTML entities to their applicable characters.
		
		-----
		
		Usage example:
		
		     {exp:mah_eencode}&amp;{/exp:mah_eencode}
		          Output: &amp;amp;
		
		     {exp:mah_eencode protect="yes"}&amp;{/exp:mah_eencode}
		          Output: &amp;
		
		     {exp:mah_eencode protect="yes"}&amp;&{/exp:mah_eencode}
		          &amp;&amp;
		
		     {exp:mah_eencode}&{/exp:mah_eencode}
		          Output: &amp;
		
		     {exp:mah_eencode decode="yes"}&amp;{/exp:mah_eencode}
		          Output: &
		
		     {exp:mah_eencode decode="yes"}&amp;amp;{/exp:mah_eencode}
		          Output: &amp;
		
		-----
		
		Changelog:
		
		     Version 1.0
		     ******************
		     2010/11/28: Initial public release.
		
		<?php
		
		$buffer = ob_get_contents();
		
		ob_end_clean(); 
		
		return $buffer;
		
	}
	
	// --------------------------------------------------------------------
	
}

/* End of file pi.mah_eencode.php */
/* Location: ./system/expressionengine/third_party/mah_eencode/pi.mah_eencode.php */