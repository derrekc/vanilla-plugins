<?php

// Define the plugin:
$PluginInfo['BlueSky'] = array(
	'Description' => 'This is a "Blue Sky" plugin with, maybe, a "hello world" greeting.',
	'Version' => '0.9',
	'Author' => 'Derrek Lemar Croney',
	'AuthorEmail' => 'godecro@gmail.com',
	'AuthorUrl' => 'http://derreklemar.com',
);

class BlueSky extends Gdn_Plugin {
	/**
	 * Place a custom item in the 'Discussion Options' menu 
	 */
	public function DiscussionsController_DiscussionOptions_Handler(&$Sender) {
		$Sender->Options .= '<li><a href="">Blue Sky Options</a></li>';
	}

	public function SettingsController_Render_Before($Sender) {
		if (isset($Sender->RequestMethod) && $Sender->RequestMethod == 'managecategories') {
			// do something special when 'managecategories' is the request method
		}
	}

	/**
	 * I believe this is where we can inspect the environment and 
	 * potentially hook up a category-specific theme
	 */
	public function Base_Render_Before($Sender) {
	}

	public function CategoriesController_Render_Before($Sender) {
		$bool = method_exists($Sender, 'AddCssFile');
		$o = array(
			'classname' =>get_class($Sender),
			'bool' => $bool,
		);
	}
}
