<?php

/**
 * PongoCMS Interface Composer
 */
View::composer('cms::interface.templates.default', function($view) {

	$view->title = Auth::check();

});