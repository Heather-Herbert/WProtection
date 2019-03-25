<?php
/**
 * Created by PhpStorm.
 * User: heather
 * Date: 25/03/19
 * Time: 12:47
 */


//namespace WProtectionTests;

if (! defined('PATH_PREFIX')) {
    define("PATH_PREFIX", "../");
}

include(PATH_PREFIX . "WProtection/Models/OAuthUser.php");


use WProtection\Models\OAuthUser;
use PHPUnit\Framework\TestCase;

class OAuthUserTest extends TestCase
{

    public function testGenerateGUIDCreatesSomethingNotBlank(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateGUID();
        $this->assertTrue($testUser->getGUID() != "");
    }

    public function testGenerateGUIDCreatesSomethingTheCorrectSize(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateGUID();
        $this->assertTrue(strlen($testUser->getGUID()) == 36);
    }

    public function testGenerateGUIDCreatesSomethingUnique(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateGUID();
        $testString = $testUser->getGUID();
        $testUser->GenerateGUID();
        $this->assertTrue($testUser->getGUID() != $testString);
    }

    public function testGenerateSecretCreatesSomethingNotBlank(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateSecret();
        $this->assertTrue($testUser->getSecret() != "");
    }

    public function testGenerateSecretCreatesSomethingTheCorrectSize(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateSecret();
        $this->assertTrue(strlen($testUser->getSecret()) == 45);
    }

    public function testGenerateSecretCreatesSomethingUnique(): void
    {
        $testUser = new OAuthUser();
        $testUser->GenerateSecret();
        $testString = $testUser->getSecret();
        $testUser->GenerateSecret();
        $this->assertTrue($testUser->getSecret() != $testString);
    }


}