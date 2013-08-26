<?php

Route::get('/pongo', function() {

	return Config::get('cms::test.package');

});