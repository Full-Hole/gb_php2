<?php

require_once dirname(__DIR__) . '/hw5/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

spl_autoload_register("gbStandardAutoload");

function gbStandardAutoload($className)
{
    $dirs = [
            'controller',
            'model',
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';
        if (is_file($fileName)) {

            require_once($fileName);
            $found = true;
        }
    }
	//$obj = new A;
		
    if (!$found) {
        throw new Exception('Unable to load ' . $className . ' in '.$fileName);
}
    return true;
}
