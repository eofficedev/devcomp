<?php
function load_ci_class($path, $prop = null)
{
    require_once($path.'.php');
    $name = end(explode('/', $path));
    $class = ucfirst($name);
    $ci =& get_instance();
    if($prop == null) $prop = strtolower($name);
    $ci->$prop = new $class();
    return $ci->$prop;
}
