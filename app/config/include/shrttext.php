<?php
//$input = "demo text";
//$length =35;
//echo shorter($input, $length);

function shorter($input, $length)
{
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    if(!$last_space) $last_space = $length;
    $trimmed_text = substr($input, 0, $last_space);

    //add ellipses (...)
    $trimmed_text .= '...';

    return $trimmed_text;
}
?>