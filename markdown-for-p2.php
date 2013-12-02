<?php

/*
Plugin Name: Markdown for P2
Plugin URI: http://wordpress.org/extend/markdown-for-p2
Description: Markdown for P2 will enable Markdown formatting within your P2 theme status updates and comments.
Version: 0.2.0
Author: Ryan Imel
Author URI: http://wpcandy.com
License: GPL

PHP Markdown & Extra
Copyright (c) 2004-2009 Michel Fortin
<http://michelf.com/>
All rights reserved.

Based on Markdown
Copyright (c) 2003-2006 John Gruber
<http://daringfireball.net/>
All rights reserved.

*/

// Kudos to abackstrom on Github https://gist.github.com/1561020
// http://michelf.com/projects/php-markdown/extra/
require_once( dirname(__FILE__) . '/php-markdown/Michelf/MarkdownExtra.inc.php' );


/**
 * Format posts/comments with Markdown at display time.
 **/
function markdown_for_p2_content_comment_format( $text ) {

	if ( ! class_exists('\Michelf\MarkdownExtra') ) {
		return $text;
	}

	$text = \Michelf\MarkdownExtra::defaultTransform($text);

	return $text;
}
add_filter( 'comment_text', 'markdown_for_p2_content_comment_format', 2 );
add_filter( 'the_content', 'markdown_for_p2_content_comment_format', 2 );