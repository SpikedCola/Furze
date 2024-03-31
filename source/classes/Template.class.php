<?php declare(strict_types=1);

/**
 * Template Class
 * 
 * Adds the following modifiers:
 * - {{$var}} - auto html-escaped
 * - {%var} - auto isset() check (can be combined with {{}})
 * 
 * @author Jordan Skoblenick <parkinglotlust@gmail.com> April 28, 2013
 * @requires Smarty3  (composer require smarty/smarty:~3.1)
 */

class Template extends Smarty {
	/**
	 * The page title
	 * @var string 
	 */
	public $title = null;
	/**
	 * A wrapper template
	 * @var string 
	 */
	public $wrapper = null;
	/**
	 * An array of css files to load
	 * @var array 
	 */
	protected $css = array();
	/**
	 * An array of js files to load
	 * @var array 
	 */
	protected $js = array();
	
	protected $builtins = [
	    'strtolower',
	    'filter_var',
	    'count',
	    'htmlentities'
	];

	public function __construct(string $templatesDir, string $templates_cDir, string $cacheDir, bool $disableCaching = false) {
		parent::__construct();

		//$this->registerFilter('pre', array($this, 'prefilter_percentIsset'));
		//$this->registerFilter('pre', array($this, 'prefilter_doubleCurlies'));
		
		$this->registerPlugin('modifier', 's', ['Util', 'S']);
		$this->registerPlugin('modifier', 'autoversion', ['Util', 'AutoVersion']);
		
		
		$this->setTemplateDir($templatesDir); 
		$this->setCompileDir($templates_cDir); 
		$this->setCacheDir($cacheDir); 

		// add back builtin php functions that were removed (eg. $array|var_dump)
		foreach ($this->builtins as $builtin) {
			$this->registerPlugin('modifier', $builtin, $builtin); 
		}
		
		// if we're in development mode, always recompile templates
		if ($disableCaching) {
			$this->force_compile = true;
			$this->caching = 1;
			$this->compile_check = true;
		}
	}

	/**
	 * Adds a JS file to the internal array, to be 
	 * automatically added to a template
	 * 
	 * @param string $file
	 */
	public function js($file) {
		$this->js[] = $file;
	}

	/**
	 * Adds a CSS file to the internal array, to be 
	 * automatically added to a template
	 * 
	 * @param string $file
	 */
	public function css($file) {
		$this->css[] = $file;
	}

	/**
	 * Converts {{$var}} into {$var|escape:'html'}
	 * 
	 * @param string $code 
	 */
	protected function prefilter_doubleCurlies($code) : string{
		return preg_replace('/\{\{(.+?)\}\}/', '{$1|escape:"html"}', $code); 
	}

	/**
	 * Converts {%var} into {if isset($var}}{$var}{/if}. Also works
	 * with double curlies: {{%var}} -> {if isset($var)}{{$var}}{/if}
	 * 
	 * @param string $code 
	 */
	protected function prefilter_percentIsset($code) : string {
		return preg_replace('/(\{{1,2})%([^\}]+)(\}{1,2})/', '{if isset(\$$2)}$1\$$2$3{/if}', $code);
	}

	
	protected function assignTemplateParams($template) {
		global $errors;
		
		// auto assign errors array
		if (is_array($errors)) {
			$this->assign('errors', $errors);
		}			
		$this->assign('_title', $this->title);
		$this->assign('_css', $this->css);
		$this->assign('_js', $this->js);
		$this->assign('_content', $template);
	}
	
	/**
	 * Apparantly display function isnt called by fetch anymore? 
	 * Template doesnt really work any more, prefilters wont register and display doesnt call fetch... ffs
	 * 
	 * @param string $template
	 * @param type $cache_id
	 * @param type $compile_id
	 * @param type $parent
	 */
	public function display($template = null, $cache_id = null, $compile_id = null, $parent = null) {
		$this->assignTemplateParams($template);
		if ($this->wrapper) {
			$template = $this->wrapper;
		}
		parent::display($template, $cache_id, $compile_id, $parent);
	}
	
	/**
	 * Fetches a template
	 * 
	 * @global array $errors
	 * @param string $template Template to display. ".tpl" will be added if omitted
	 * @return string Template contents
	 */
	public function fetch($template = null, $cache_id = null, $compile_id = null, $parent = null, $display = false, $merge_tpl_vars = true, $no_output_filter = false) : string {
		//$this->compile_id = md5($id);
		$this->assignTemplateParams($template);
		if ($this->wrapper) {
			$template = $this->wrapper;
		}
		return parent::fetch($template, $cache_id, $compile_id, $parent, $display, $merge_tpl_vars, $no_output_filter);
	}
}
