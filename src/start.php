<?php

/**
 * Define User constants
 *
 * Valued in LoginController@login POST
 */

define('USERID', Session::get('USERID'));
define('USERNAME', Session::get('USERNAME'));
define('EMAIL', Session::get('EMAIL'));
define('ROLENAME', Session::get('ROLENAME'));
define('LEVEL', Session::get('LEVEL'));
define('LANG', Session::get('LANG'));
define('INTERFACE', Session::get('INTERFACE', Config::get('cms::settings.language')));
define('EDITOR', Session::get('EDITOR'));