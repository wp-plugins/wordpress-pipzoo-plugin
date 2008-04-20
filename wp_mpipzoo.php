<?php
/**
* Pipzoo (c) based
* @author Pipzoo Inc
* @version 1.0.0.0
* http://www.pipzoo.com
*/

/*
  To Use: "[mpipzoo vote_code]"
*/

define( 'pipzoo_REGEXP', '/\[mpipzoo ([[:print:]]+)\]/' );
define( 'pipzoo_TARGET', '<div><object width="460" height="360"><param name="wmode" value="transparent"> <param name="movie" value="http://www.pipzoo.com/flash/pipzoo_slider_export.swf?v=###id###" /><param name="quality" value="high" /><embed src="http://www.pipzoo.com/flash/pipzoo_slider_export.swf?v=###id###" wmode="transparent" quality="high" width="460" height="360" type="application/x-shockwave-flash" /></object></div>' );

function pipzoo_plugin_callback( $match ) {
  $tag_parts = explode( " ", rtrim( $match[0], "]" ) );
  $output    = pipzoo_TARGET;
  $output    = str_replace( "###id###", $tag_parts[1], $output );  
  return $output;
}

function pipzoo_plugin( $content ) {  
  return preg_replace_callback( pipzoo_REGEXP, 'pipzoo_plugin_callback', $content );
}

add_filter( 'the_content' , 'pipzoo_plugin', 1 );
add_filter( 'comment_text', 'pipzoo_plugin'    );

?>