<?php

declare(strict_types = 1);

namespace Nubank\Config;

/**
 * Class Credentials
 *
 * @package Nubank\Config
 */
class Credentials extends ConfigAbstract
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $password;

    /**
     * @return string
     */
    public function getUserId()
    {
        return (string) $this->userId;
    }

    /**
     * @param $userId
     *
     * @return $this
     * @throws \Nubank\Framework\Exception\InvalidException
     */
    public function setUserId($userId)
    {
        if (!$this->validateUserId($userId)) {
            throw new \Nubank\Framework\Exception\InvalidException('Invalid User ID number.');
        }

        $this->userId = $this->normalizeUserId($userId);

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return (string) $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $userId
     *
     * @return string|string[]|null
     */
    private function normalizeUserId(string $userId)
    {
        $userId = preg_replace('/[^0-9]/', null, $userId);
        $userId = str_pad($userId, 11, '0', STR_PAD_LEFT);
        return $userId;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function validateUserId($value)
    {
        $c = $this->normalizeUserId($value);

        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--) ;

        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--) ;

        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }
}
