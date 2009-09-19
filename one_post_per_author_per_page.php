<?php
/*
Plugin Name: One Post Per Author Per Page
Plugin URI: http://wakeless.net/archive/2009/08/one-post-per-author-per-page
Author: Michael Gall
Author URI: http://myachinghead.net/
Stable Tag: 0.2
*/

/*  Copyright 2009 Michael Gall (email : michael@wakeless.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


global $wpdb;
function one_post_per_author_post_where($where) {
	global $wpdb;
	if(!is_author() && !is_admin()) {
		return $where .= " AND wp_posts.id = (select id from {$wpdb->prefix}posts p2 where p2.post_status = 'publish' and p2.post_author = {$wpdb->prefix}posts.post_author order by p2.post_date desc limit 0,1)";
	}
}
add_filter("posts_where_request", "one_post_per_author_post_where");