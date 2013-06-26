<?php

/*
Plugin Name: anyEmbed
Version:     0.1
Author:      nan
Author URI:  http://nan.im/
Plugin URI:  http://nan.im/blog/
Description: Easy embed some sources.
*/


// embed gist script
wp_embed_register_handler('GIST','#https://gist.github.com/(?<USER>\w*)/(?<GUID>\d*)#i','anyEmbedGIST');
function anyEmbedGIST($matches, $attr, $url, $rawattr){
    //$embed = sprintf('<script src="https://gist.github.com/%s/%u.js"></script>', $matches['USER'], $matches['GUID']);
    $embed = sprintf('<script src="%s.js"></script>', $matches[0]);
    return apply_filters('GIST', $embed, $matches, $attr, $url, $rawattr);
}


// embed ed2k link
add_filter('the_content', 'anyEmbedHTML');
function anyEmbedHTML($html){

    $pattern = array(
        '#ed2k://\|file\|([^|]+)\|(\d+)\|[0-9A-Z]{32}\|(h=[0-9A-Z]{32}\|)?/#i',
    );
    $replacement = array(
        '<a target="_blank" href="$0">ed2k://$1</a>',
    );

    return preg_replace($pattern, $replacement, $html);
}


