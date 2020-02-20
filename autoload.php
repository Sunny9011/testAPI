<?php

spl_autoload_register(function ($class)
{
    $fileName = $class . '.php';
    if (!file_exists($fileName)) {
        return false;
    }

    include $fileName;
});
