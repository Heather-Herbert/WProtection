<?php
/**
 * Created by PhpStorm.
 * User: heather
 * Date: 24/03/19
 * Time: 21:50
 */

namespace WProtection;

include('../3rdParty/log4php/Logger.php');
Logger::configure('config.xml');

use mysql_xdevapi\Exception;
use WProtection\Models;

class database
{
    /** Holds the Logger. */
    private $log;

    /** Logger is instantiated in the constructor. */
    public function __construct()
    {
        // The __CLASS__ constant holds the class name, in our case "Foo".
        // Therefore this creates a logger named "Foo" (which we configured in the config file)
        $this->log = Logger::getLogger(__CLASS__);
    }

    public function isRateLimited() : bool
    {

    }

    public function checkHash(file $fileToCheck) : bool
    {
        $stmt = null;
        $retValue = false;
        $dbh = $this->_connect();
        if ($dbh != null) {
            $stmt = $dbh->prepare("CALL `CHECK_Hash`(?, ?, ?);");
            $stmt->bindValue(1, $fileToCheck->getVersion(), PDO::PARAM_STR);
            $stmt->bindValue(2, $fileToCheck->getFilePath(), PDO::PARAM_STR);
            $stmt->bindValue(3, $fileToCheck->getHash(), PDO::PARAM_STR);

            $stmt->execute();
            $itemCount = $stmt->fetchColumn();
            if($itemCount > 0){
                $retValue = true;
            } else {
                $this->log->info("itemCount = ]".$itemCount."[");
            }
        }

        return $retValue;
    }

    private function _connect()
    {

        $db = null;
        try {
            $db = new \PDO(settings::$DB_DSN, settings::$DB_USER, settings::$DB_PASS);
        } catch (Exception $ex) {
            $this->log->fatal('Connection failed: ' . $ex->getMessage());
        }
        return $db;

    }

}