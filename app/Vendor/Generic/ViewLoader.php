<?php
App::uses('HtmlHelper', 'View/Helper');
class ViewLoader extends HtmlHelper {
	
	public function addMeta($controller, $action) {
		$meta = '';
		
		$meta .= "\n";
		$meta .= "\t". $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')). "\n";
		$meta .= "\t". $this->Html->meta('favicon.ico','/img/favicon.ico',array('type' => 'icon')). "\n";
		return $meta;
	}
}
