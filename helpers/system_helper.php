<?php
/**
 * Created by PhpStorm.
 * User: Nemanja
 * Date: 27.2.2017
 * Time: 20:40
 */


/**
 * Print selected variable, and optional die/stop script
 * NOTE: Only for Developer purposes
 *
 * @param $variable
 * @param bool $die
 * @param bool $forceDebugging
 */
function debug($variable, $die = true, $forceDebugging = false)
{

    if (DEBUGGING || $forceDebugging) {

        if (empty($variable)) {
            echo 'Empty value...';
            if ($die) die;
        }

        echo '<pre>';
        print_r($variable);
        echo '</pre>';

        if ($die)
            die;

    }
}


/**
 * Include and show Controller/View content
 *
 * @param $controller
 */
function includeController($controller) {

    /*
     * Defaults
     */
    $defaultController = 'landing';


    $controllerDir = BASE_DIR . 'controllers/';

    $controller = (empty($controller)) ? $defaultController: $controller;

    $controllerFile = $controllerDir . $controller . '.php';


    $isExistingPage = file_exists($controllerFile);


    if(!empty($controller) && $isExistingPage){
        include($controllerFile);
    } else {
        include($controllerDir . $defaultController . '.php');
    }

    echo $template;
}


/**
 * Get value from form (POST method) by selected key
 *
 * @param $key
 * @param null $default
 * @return null
 */
function getGetValue($key, $default = NULL)
{
    if (!empty($key)) {
        $tempValue = (isset($_GET[$key])) ? $_GET[$key] : $default;
        return $tempValue;
    } else {
        return $default;
    }
}
