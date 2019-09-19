<?php


/** Shortcode for Quote Blocks **/

function avid_quote_block( $atts ) {
   $a = shortcode_atts( array(
      'text' => 'quote'
   ), $atts );
   return '<blockquote class="avid-quote">' . $a['text'] . '</blockquote>';
}

add_shortcode( 'quote', 'avid_quote_block' );



/** Shortcode for Resources Blocks **/

function avid_resources_block( $atts ) {
   $a = shortcode_atts( array(
      'text' => 'text',
	  'link' => 'link',
	  'img' => 'img'
   ), $atts );
   return '<div class="avid-resource-block"><div class="row"><div class="col-sm-2 hidden-xs"><img src="' . $a['img'] .'" /></div><div class="col-sm-10">Additional Resource: <a href="' . $a['link'] . '">' . $a['text'] . '</a></div></div></div>';
}

add_shortcode( 'resource', 'avid_resources_block' );



/** Shortcode for CTA Blocks **/

function avid_cta_block( $atts ) {
   $a = shortcode_atts( array(
      'img' => 'img',
	  'link' => 'link'
   ), $atts );
   return '<div class="avid-cta-block"><a href="' . $a['link'] .'"><img src="' . $a['img'] .'" /></a></div>';
}

add_shortcode( 'cta', 'avid_cta_block' );


?>