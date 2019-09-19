<?php

add_filter('genesis_footer_creds_text', 'bsg_footer_creds_filter');

function bsg_footer_creds_filter( $creds ) {
    $rel = is_front_page() ? '' : 'rel="nofollow"';
    $creds = "<p>&copy; Copyright 2016 <a href='http://avidxchange.com/'>Avidxchange</a> &middot; All Rights Reserved</p>";
    return $creds;
}
