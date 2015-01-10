<?php
/*
Plugin Name: Strip Empty Html Tags from RSS Feed
Plugin URI: http://blog.dfmichael.org/plugins/strip-empty-html-tags-from-rss-feed/
Description: 
Version: 1.0
Author: Damiano Fusco
Author URI: http://blog.dfmichael.com/
License: GPLv3
*/

function removeEmptyHtmlTags($string, $replaceTo = null)
{
    // Return if string not given or empty
    if (!is_string($string) || trim($string) == '') return $string;

    // Recursive empty HTML tags
    return preg_replace(
        '/<(\w+)\b(?:\s+[\w\-.:]+(?:\s*=\s*(?:"[^"]*"|"[^"]*"|[\w\-.:]+))?)*\s*\/?>\s*<\/\1\s*>/',
        !is_string($replaceTo) ? '' : $replaceTo,
        $string
    );
}

function customFilter( $content ) {
    global $post;
    return removeEmptyHtmlTags($content);
}
add_filter( 'the_content_feed', 'customFilter', $encode_html );

?>