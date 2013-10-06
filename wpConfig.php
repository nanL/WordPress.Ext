<?php /* some usefull config for WordPress */

// $table_prefix  = 'blog_';                //数据表前缀
define('DB_NAME', 'database_name_here');    //数据库名称
define('DB_USER', 'username_here');         //数据库用户名
define('DB_PASSWORD', 'password_here');     //数据库密码
define('DB_HOST', 'localhost');             //数据库主机
define('DB_CHARSET', 'utf8');               //数据库编码
define('DB_COLLATE', '');                   //数据库整理类型

//Security Keys https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

//Advanced Options
define('WPLANG', 'zh_CN');
define('WP_CACHE', true);
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', true);

define('AUTOSAVE_INTERVAL', 3600);          //自动保存秒
define('WP_POST_REVISIONS', false);
define('WP_POST_REVISIONS', 3);

define('WP_ALLOW_MULTISITE', true);

define('NOBLOGREDIRECT', 'http://example.com');
define('UPLOADS', '/blog/wp-content/uploads');
define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/blog');  //
define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST'].'/blog');    //
define('WP_CONTENT_DIR', dirname(__FILE__) . '/blog/wp-content');
define('WP_PLUGIN_DIR', dirname(__FILE__) . '/blog/wp-content/plugins');


/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */
/** WordPress目录的绝对路径。 */
if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__).'/');
/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH.'wp-settings.php');
