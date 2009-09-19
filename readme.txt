=== One Post Per Author Per Page ===
Contributors: wakeless,terroir
Tags: filter posts post
Requires at least: 2.8.4
Tested up to: 2.8.4
Stable tag: 0.2

This plugin filters any posts displayed to allow only one post per author per page. 

== Changelog ==

=== 0.2 ===
Changed the way this works. Now uses a subquery in the where rather than *group by* and *count*.
This won't work on MYSQL versions < 4.1 Shouldn't be a drama for most people.