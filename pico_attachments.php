<?php

/**
 * Pico attachments plugin
 *
 * @author Gilbert Pellegrom
 * @link http://picocms.org
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Attachments {

	private $settings = array(
		'attachments_extension' => array('jpg', 'doc', 'pdf')
	);
	private $files = array();

	public function config_loaded(&$settings)
	{
		$this->settings = array_merge($this->settings, $settings);
	}
	
	public function after_load_content(&$file, &$content)
	{
		$dir = dirname($file);
 		foreach ($this->settings['attachments_extension'] as $ext) {
            foreach(glob($dir . '/*.' . $ext) as $filepath) {
            	preg_match('/\/content.*/', $filepath, $rel_path);
            	$file_info = array(
            		'abs_path' => $filepath,
            		'rel_path' => $rel_path[0],
            		'size' => filesize($filepath)
            		);
                $this->files[] = array_merge(pathinfo($filepath), $file_info);
            } 			
		}
	}
	
	public function before_render(&$twig_vars, &$twig, &$template)
	{
		$twig_vars['attachments'] = $this->files;
	}
	
}

?>
