<?php
spl_autoload_register("gbStandardAutoload");

function gbStandardAutoload($className)
{
    $dirs = [
            'c',
            'm',
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
