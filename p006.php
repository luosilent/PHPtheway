<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/7/2
 * Time: 16:59
 */
$array = array('FAAAAA'=> array(
    'BAAA' => 'ww'
));

function low_key_recursive(&$array, $case=CASE_LOWER, $flag_rec=false) {
    $array = array_change_key_case($array, $case);
    if ( $flag_rec ) {
        foreach ($array as $key => $value) {
            if ( is_array($value) ) {
                low_key_recursive($array[$key], $case, true);
            }
        }
    }
}
low_key_recursive($array, CASE_LOWER,true);
print_r($array);