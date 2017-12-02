<?php
function load_ci_class($path)
{
    require_once($path.'.php');
    $name = end(explode('/', $path));
    $class = ucfirst($name);
    $ci =& get_instance();
    $ci->$name = new $class();
    return $ci->$name;
}
