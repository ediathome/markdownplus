<?php
/**
* Diese Klasse repräsentiert den MarkdownPlus-Editor
*/
class MarkdownPlusEditor
{

	private $config;

	public static function create($config)
	{
		return new MarkdownPlusEditor($config);
	}

	public function __construct($user_conf = null) {
		$this->config = array_merge($this->default_config(), $user_conf);
	}

	public function __toString()
	{
		$rv  = $this->textarea();
		return $rv;
	}
	
	public function output()
	{
		echo $this->__toString();
	}

	private function default_config()
	{
		$config = array(
			'input_name' => "VALUE[1]", # name attribute of textarea tag
			'content' => "REX_VALUE[1]", # content of textarea tag
			'css_class' => '', # any additional css class you would like to add
			'cols' => '80', # the number of columns
			'rows' => '20' # the number of rows
		);
		return $config;
	}
	private function textarea()
	{
		$rv  = '<textarea ';
		$rv .= 'name="'.$this->config['input_name'].'" ';
		$rv .= 'id="'.$this->config['input_name'].'" ';
		$rv .= 'class="'.$this->config['css_class'].' markdownplus" ';
		$rv .= 'cols="'.$this->config['cols'].'" '; 
		$rv .= 'rows="'.$this->config['rows'].'">';
		$rv .= $this->config['content'];
		$rv .= '</textarea>';
		return $rv;
	}
}