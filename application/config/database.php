<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

//do not change database host
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'myw4be7e_social';
$db['default']['password'] = '012tmqnhtd';
$db['default']['database'] = 'myw4be7e_social';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

//fpt
$db['fpt']['hostname'] = 'xahoihocatp.net.vn';
$db['fpt']['username'] = 'xahoihocta';
$db['fpt']['password'] = '012tmqnhtd';
$db['fpt']['database'] = 'xahoihocta_vn';
$db['fpt']['dbdriver'] = 'mysql';

//admin_news
$db['admin_news']['hostname'] = 'raovatnhanh.net.co';
$db['admin_news']['username'] = 'mr_news';
$db['admin_news']['password'] = 'rCam43&0';
$db['admin_news']['database'] = 'admin_news';
$db['admin_news']['dbdriver'] = 'mysql';

//admin_education
$db['admin_education']['hostname'] = 'raovatnhanh.net.co';
$db['admin_education']['username'] = 'mrEducation';
$db['admin_education']['password'] = 'nzd$R313';
$db['admin_education']['database'] = 'admin_education';
$db['admin_education']['dbdriver'] = 'mysql';

//admin_raovatnhanh
$db['admin_raovatnhanh']['hostname'] = 'raovatnhanh.net.co';
$db['admin_raovatnhanh']['username'] = 'mr_raovat';
$db['admin_raovatnhanh']['password'] = 'qKdk811#';
$db['admin_raovatnhanh']['database'] = 'admin_raovatnhanh';
$db['admin_raovatnhanh']['dbdriver'] = 'mysql';

//thesis_notes
$db['thesis_notes']['hostname'] = 'comment.heliohost.org';
$db['thesis_notes']['username'] = 'comment_mrvideo';
$db['thesis_notes']['password'] = '012tmqnhtd';
$db['thesis_notes']['database'] = 'comment_film';
$db['thesis_notes']['dbdriver'] = 'mysql';

$db['ehow']['hostname'] = 'ehow.heliohost.org';
$db['ehow']['username'] = 'ehow';
$db['ehow']['password'] = '012tmqnhtd';
$db['ehow']['database'] = 'ehow_company';
$db['ehow']['dbdriver'] = 'mysql';

//compare price
$db['compare']['hostname'] = 'compare.heliohost.org';
$db['compare']['username'] = 'compare_quantm';
$db['compare']['password'] = '012tmqnhtd';
$db['compare']['database'] = 'compare_product';
$db['compare']['dbdriver'] = 'mysql';

//lazada affiliate database
$db['lazada']['hostname'] = 'lazada.heliohost.org';
$db['lazada']['username'] = 'lazada_quantm';
$db['lazada']['password'] = '012tmqnhtd';
$db['lazada']['database'] = 'lazada_affiliate';
$db['lazada']['dbdriver'] = 'mysql';

/* End of file database.php */
/* Location: ./application/config/database.php */