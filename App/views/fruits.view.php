<?php
$output = '<ul>';
foreach ($content['fruits'] as $fruits) {
    $output .= "<li> $fruits</li>";
}
$output .= '</ul>';
return $output;
