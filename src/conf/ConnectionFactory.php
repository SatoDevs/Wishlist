<?php
namespace ProjetPHP\conf;

require_once './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

class ConnectionFactory{

    private static $conf = null;

    public static function setConfig($configfile){
        self::$conf = parse_ini_file($configfile);
        if (is_null(self::$conf))
	    throw new DBException("Erreur");
    }
    
    public static function makeConnection(){        /** A voir si déplacement dans l'index ???*/
        $db = new DB();
        $db->addConnection(self::$conf);
        $db->setAsGlobal();
        $db->bootEloquent();
  }
}


?>
