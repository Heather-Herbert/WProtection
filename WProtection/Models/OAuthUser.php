<?php
/**
 * Created by PhpStorm.
 * User: heather
 * Date: 25/03/19
 * Time: 12:31
 */

namespace WProtection\Models;

if (! defined('PATH_PREFIX')) {
    define("PATH_PREFIX", "../../");
}

use Logger;

include(PATH_PREFIX . 'WProtection/3rdParty/log4php/Logger.php');
Logger::configure(PATH_PREFIX . 'WProtection/Classes/config.xml');


class OAuthUser
{
    /** Holds the Logger. */
    private $log;
    private $_GUID;
    private $_level;
    private $_secret;
    private $_name;


    /** Logger is instantiated in the constructor. */
    public function __construct()
    {
        // The __CLASS__ constant holds the class name, in our case "Foo".
        // Therefore this creates a logger named "Foo" (which we configured in the config file)
        $this->log = Logger::getLogger(__CLASS__);

        $this->_GUID = "";
        $this->_level = 0;
        $this->_secret = "";
        $this->_name = "";

    }

    private $_email;

    /**
     * @return mixed
     */
    public function getEmail() : string
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getGUID() : string
    {
        return $this->_GUID;
    }

    /**
     * @param mixed $GUID
     */
    public function setGUID(string $GUID): void
    {
        $this->_GUID = $GUID;
    }

    /**
     * @return mixed
     */
    public function getLevel() : int
    {
        return $this->_level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel(int $level): void
    {
        $this->_level = $level;
    }

    /**
     * @return mixed
     */
    public function getSecret() : string
    {
        return $this->_secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret(string $secret): void
    {
        $this->_secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function GenerateGUID() : void
    {
        $this->_GUID = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function GenerateSecret() : void
    {
        $this->_secret = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X-%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}