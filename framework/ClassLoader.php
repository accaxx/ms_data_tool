<?php

class ClassLoader
{
    static public function load($class)
    {
        include $class . '.php';
    }
}

spl_autoload_register(array('ClassLoader', 'load'));
