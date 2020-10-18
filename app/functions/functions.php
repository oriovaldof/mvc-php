<?php
/**
 * Undocumented function
 *
 * @param array $param
 * @param boolean $die
 * @return void
 */
function dd($param = [], $die = true)
{
    echo '<pre style="background: #ccc; padding: 15px; font-weight: bold;">';
    print_r($param);
    echo '</pre>';
    if ($die) die();
}
