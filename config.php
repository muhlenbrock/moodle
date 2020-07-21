<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();
if(getenv('DATABASE_URL'))
{
    $dburl = parse_url(getenv("DATABASE_URL"));
    // remove the slash from url path
    $database_name =  str_replace('/', '', $dburl['path']);
    putenv('DATABASE_HOST='.$dburl['host']);
    putenv('DATABASE_NAME='.$database_name);
    putenv('DATABASE_USER='.$dburl['user']);
    putenv('DATABASE_PASSWORD='.$dburl['pass']);
}

$CFG->dbtype    = getenv('DATABASE_TYPE');
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('DATABASE_HOST');
$CFG->dbname    = getenv('DATABASE_NAME');
$CFG->dbuser    = getenv('DATABASE_USER');
$CFG->dbpass    = getenv('DATABASE_PASSWORD');
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => getenv('DATABASE_PORT'),
  'dbsocket' => '',
);

$CFG->wwwroot   = getenv('WWWROOT');
$CFG->dataroot  = '/home/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
