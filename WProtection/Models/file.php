<?php
/**
 * Created by PhpStorm.
 * User: heather
 * Date: 25/03/19
 * Time: 11:03
 */

namespace WProtection\Models;

if (! defined('PATH_PREFIX')) {
    define("PATH_PREFIX", "../../");
}

include(PATH_PREFIX . 'WProtection/vendor/autoload.php');

logger::configure(PATH_PREFIX . 'WProtection/Classes/config.xml');



class file
{
    /** Holds the Logger. */
    private $log;

    /** Logger is instantiated in the constructor. */
    public function __construct()
    {
        // The __CLASS__ constant holds the class name, in our case "Foo".
        // Therefore this creates a logger named "Foo" (which we configured in the config file)
        $this->log = logger::getLogger(__CLASS__);


        $_version = null;
        $_filePath = null;
        $_hash = null;

    }


    private $_version;                  // varchar(45)
    private $_filePath;                 // varchar(255)
    private $_hash;                     // varchar(64)

    /**
     * @return string
     */
    public function getVersion() : string
    {
        return $this->_version;
    }

    /**
     * @param string $version wordpress version of the file
     */
    public function setVersion(string $version)
    {
        if (! strlen($version) > 45) {
            $this->_version = $version;
        } else {
            /** @noinspection SpellCheckingInspection */
            $this->log->error("Error in WProtection\\Models\\file::setVersion strlen(version) is over 45, version = ]".$version."[");
        }
    }

    /**
     * @return string
     */
    public function getFilePath() : string
    {
        return $this->_filePath;
    }

    /**
     * @param string $filePath the location of the file, based on the wordpress root folder.
     */
    public function setFilePath(string $filePath)
    {
        if (! strlen($filePath) > 255) {
            $this->_filePath = $filePath;
        } else {
            /** @noinspection SpellCheckingInspection */
            $this->log->error("Error in WProtection\\Models\\file::setFilePath strlen(filePath) is over 255, filePath = ]".$filePath."[");
        }
    }

    /**
     * @return string
     */
    public function getHash() : string
    {
        return $this->_hash;
    }

    /**
     * @param string $hash the SHA-2 (512) hash of the file
     */
    public function setHash(string $hash)
    {
        if(! strlen($hash) > 64) {
            $this->_hash = $hash;
        } else {
            /** @noinspection SpellCheckingInspection */
            $this->log->error("Error in WProtection\\Models\\file::setHash strlen(hash) is over 64, hash = ]".$hash."[");
        }
    }



}