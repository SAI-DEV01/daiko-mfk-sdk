<?php

declare(strict_types=1);

namespace MfkSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use MfkSdk\Support\Str;

/**
 * @method \MfkSdk\Api\CustomerApi customer 顧客
 * @method \MfkSdk\Api\DestinationApi destination 請求先
 * @method \MfkSdk\Api\CustomerExaminationApi customerExamination 与信枠審査
 * @method \MfkSdk\Api\CreditFacilityApi creditFacility 与信枠
 * @method \MfkSdk\Api\TransactionApi transaction 取引
 * @method \MfkSdk\Api\BillingApi billing 請求
 * @method \MfkSdk\Api\PayoutApi payout 振込
 * @method \MfkSdk\Api\PayoutTransactionApi payoutTransaction 債券
 * @method \MfkSdk\Api\CustomerNameUpdateApi customerNameUpdate 顧客名変更申請
 * @method \MfkSdk\Api\AuthorizationApi authorization オーソリゼーション
 */
class MfkApi
{
    // シングルトンのインスタンスを保持するための静的プロパティ
    private static $instances = [];

    /**
     * Guzzleクライアント Singleton instance
     *
     * @var Client
     */
    protected $client;

    /**
     * API ENV production|sandbox
     *
     * @var production|sandbox
     */
    protected $env;

    /**
     * @param string $apikey
     * @return $this
     */
    public function __construct(string $apikey, $env = null)
    {
        $this->env = $env;
        $this::$client = new Client(
            [
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'apikey' => $apikey,
                ]
            ]
        );
        return $this;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        $className = Str::studly($method);

        $fullClassName = "MfkSdk\\Api\\{$className}Api";

        if (!class_exists($fullClassName))
            throw new Exception("Class $fullClassName does not exist.");

        if (!isset(self::$instances[$fullClassName]))
            self::$instances[$fullClassName] = new $fullClassName($this::$client, $this->env);

        return self::$instances[$fullClassName];
    }
}
