<?php

namespace MfkSdk\Api;

abstract class AbstractApi
{
    /**
     * API ENV
     * @var string
     */
    public $env = "sandbox";

    /**
     * Guzzleクライアント Singleton instance
     *
     * @var Client
     */
    protected $client;

    /**
     * API エンドポイント
     * productionとsandboxがある
     *
     * @var array
     */
    protected $endpoint = [
        "production" => "https://api.mfkessai.co.jp/v2/",
        "sandbox" => "https://sandbox-api.mfkessai.co.jp/v2/"
    ];

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * エントリーポイント 継承元で定義必須
     *
     * @var string
     */
    protected $entrypoint;

    /**
     * GET
     *
     * @param array $body
     * @return array
     */
    protected function get(array $body = [])
    {
        return json_decode($this->client->request(
            'GET',
            $this->endpoint[$this->env] . $this->entrypoint,
            ['query' => $body]
        )->getBody(), true);
    }
}
