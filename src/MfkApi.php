<?php

declare(strict_types=1);

namespace MfkSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use MfkSdk\Support\Str;


class MfkApi
{
    // シングルトンのインスタンスを保持するための静的プロパティ
    private static $instances = [];

    /**
     * Guzzleクライアント Singleton instance
     *
     * @var Client
     */
    protected static $client;

    /**
     * @param string $apikey
     * @return $this
     */
    public function __construct(string $apikey)
    {
        if (null === self::$client) {
            self::$client = new Client(
                [
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'apikey' => $apikey,
                    ]
                ]
            );
        }
        return $this;
    }

    /**
     * @param string $className
     */
    private function __(string $className)
    {
        $className = Str::studly($className);
        $fullClassName = "MfkSdk\\Api\\{$className}Api";

        if (!class_exists($fullClassName))
            throw new Exception("Class $fullClassName does not exist.");

        if (!isset(self::$instances[$fullClassName]))
            self::$instances[$fullClassName] = new $fullClassName(self::$client);

        return self::$instances[$fullClassName];
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return $this->__($method);
    }

    /**
     * @return \MfkSdk\Api\CustomerApi
     */
    public function customer()
    {
        return $this->__(__FUNCTION__);
    }

    /**
     * @return \MfkSdk\Api\CustomerExaminationApi
     */
    public function customerExamination()
    {
        return $this->__(__FUNCTION__);
    }

    /**
     * @return \MfkSdk\Api\CreditFacilityApi
     */
    public function creditFacility()
    {
        return $this->__(__FUNCTION__);
    }

    /**
     * @return \MfkSdk\Api\TransactionApi
     */
    public function transaction()
    {
        return $this->__(__FUNCTION__);
    }

    /**
     * @return \MfkSdk\Api\DestinationApi
     */
    public function destination()
    {
        return $this->__(__FUNCTION__);
    }
}
