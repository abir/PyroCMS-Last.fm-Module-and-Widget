<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package 		PyroCMS
 * @subpackage 		Last.fm Feed Widget
 * @author			Ben Edmunds - PyroCMS Development Team
 * 
 * Show Last.fm scrobbler feeds in your site
 */

class Lastfm_feed extends Widgets
{
	public $title = 'Last.fm Feed';
	public $description = 'Display scrobbled tracks from Last.fm';
	public $author = 'Ben Edmunds';
	public $website = 'http://benedmunds.com/';
	public $version = '1.0';
	
	public $fields = array(
		array(
			'field'   => 'username',
			'label'   => 'Last.fm Username',
			'rules'   => 'required'
		),
		array(
			'field'   => 'number',
			'label'   => 'Number of Tracks',
			'rules'   => 'numeric'
		)
	);
	
	public function run($options)
	{
		$this->load->model('lastfm/lastfm_m');
		$this->lang->load('lastfm/lastfm');

		!empty($options['username']) || $options['username'] = $this->settings->item('lastfm_username');
		!empty($options['number']) || $options['number'] = 5;
		                                                             
        $this->lastfm_m->load($options['username'], $options['number']);                 
		$tracks = $this->lastfm_m->get_latest();
		
		// Store the feed items
		return array(
			'tracks' => $tracks,
			'options' => $options
		);
		
	}
}