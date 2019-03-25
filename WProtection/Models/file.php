<?php
/**
 * Created by PhpStorm.
 * User: heather
 * Date: 25/03/19
 * Time: 11:03
 */


namespace WProtection\Models;

include('../3rdParty/log4php/Logger.php');
Logger::configure('../classes/config.xml');


class file
{
    /** Holds the Logger. */
    private $log;

    /** Logger is instantiated in the constructor. */
    public function __construct()
    {
        // The __CLASS__ constant holds the class name, in our case "Foo".
        // Therefore this creates a logger named "Foo" (which we configured in the config file)
        $this->log = Logger::getLogger(__CLASS__);


        $_version = null;
        $_filePath = null;
        $_hash = null;

    }


    private $_version;                  // varchar(45)
    private $_filePath;                 // varchar(255)
    private $_hash;                     // varchar(64)

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * @param string $version wordpress version of the file
     */
    public function setVersion($version)
    {
        if (! strlen($version) > 45) {
            $this->_version = $version;
        } else {
            $this->log->error("Error in WProtection\\Models\\file::setVersion strlen(version) is over 45, version = ]".$version."[");
        }
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->_filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        if (! strlen($filePath) > 255) {
            $this->_filePath = $filePath;
        } else {
            $this->log->error("Error in WProtection\\Models\\file::setFilePath strlen(filePath) is over 255, filePath = ]".$filePath."[");
        }
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->_hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        if(! strlen($hash) > 64) {
            $this->_hash = $hash;
        } else {
            $this->log->error("Error in WProtection\\Models\\file::setHash strlen(hash) is over 64, hash = ]".$hash."[");
        }
    }



}