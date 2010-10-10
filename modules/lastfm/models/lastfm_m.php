<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lastfm_m extends Model {

	private $CI;
	
	function __construct()
	{
		parent::Model();
		
		$this->CI =& get_instance();
		$this->CI->load->library('lastfm/lastfm');
	}
	
	function load($username, $number) 
    {
        $config = 	array(
                        'user'	         => $username,
                        'num'	         => $number,
                        'rss_cache_path' => APPPATH . 'cache/simplepie/', 
                         );              
        $this->CI->lastfm->init($config);
        
        return $config;
    }
	
	// Just call whatever was asked for with whatever it was given
	function __call($method, $arguments)
	{
	    if (method_exists($this, $method))
	    {
           return call_user_func_array(array($this, $method), $arguments);
        }
        elseif (method_exists($this->CI->lastfm, $method))
        {
		  return call_user_func_array(array($this->CI->lastfm, $method), $arguments);
		}
	}
	
}
?>