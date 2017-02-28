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