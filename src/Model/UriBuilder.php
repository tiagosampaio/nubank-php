<?php

declare(strict_types = 1);

namespace Nubank\Model;

/**
 * Class UriBuilder
 *
 * @package Nubank\Model
 */
class UriBuilder
{
    /**
     * @var string
     */
    const PROTOCOL_UNSECURE = 'http';

    /**
     * @var string
     */
    const PROTOCOL_SECURE = 'https';

    /**
     * @param string $host
     * @param string $path
     * @param array  $query
     * @param bool   $secure
     *
     * @return string
     */
    public function build($host, $path, array $query = [], $secure = true)
    {
        $uri = vsprintf('%s://%s/%s', [
            (bool) $secure ? self::PROTOCOL_SECURE : self::PROTOCOL_UNSECURE,
            $this->clean($host),
            $this->clean($path)
        ]);

        if (!empty($query)) {
            $uri .= '?' . $this->querystring($query);
        }

        return $uri;
    }

    /**
     * @param array $query
     *
     * @return string
     */
    private function querystring(array $query = [])
    {
        array_walk($query, function (&$value, $key) {
            $value = implode('=', [$key, $value]);
        });

        return implode('&', $query);
    }

    /**
     * @param string $value
     *
     * @return string
     */
    private function clean(string $value)
    {
        return trim($value, "\t\n\r\0\/");
    }
}
