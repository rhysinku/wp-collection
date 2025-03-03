<?php

function rda_acf_json_save_point($path) {
return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'rda_acf_json_save_point');


function rda_acf_json_load_point($paths) {
unset($paths[0]);
$paths[] = get_stylesheet_directory() . '/acf-json';
return $paths;
}
add_filter('acf/settings/load_json', 'rda_acf_json_load_point');