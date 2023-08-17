<?php

namespace MfkSdk\Api;

use MfkSdk\Support\Str;

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
    protected function get(?array $body = [], $path = null)
    {
        return json_decode($this->client->request(
            'GET',
            $this->uri($path),
            ['query' => $body]
        )->getBody(), true);
    }

    /**
     * POST
     *
     * @param array $body
     * @return array
     */
    protected function post(array $body = [], $path = null)
    {
        return json_decode($this->client->request(
            'POST',
            $this->uri($path),
            ['json' => $body]
        )->getBody(), true);
    }

    /**
     * PUT
     *
     * @param array $body
     * @return array
     */
    protected function put(array $body = [], $path = null)
    {
        return json_decode($this->client->request(
            'PUT',
            $this->uri($path),
            ['json' => $body]
        )->getBody(), true);
    }

    /**
     * PATCH
     *
     * @param array $body
     * @return array
     */
    protected function patch(array $body = [], $path = null)
    {
        return json_decode($this->client->request(
            'PATCH',
            $this->uri($path),
            ['json' => $body]
        )->getBody(), true);
    }

    /**
     * DELETE
     *
     * @param array $body
     * @return array
     */
    protected function delete(array $body = [], $path = null)
    {
        return json_decode($this->client->request(
            'DELETE',
            $this->uri($path),
            ['json' => $body]
        )->getBody(), true);
    }

    /**
     * Request URI
     *
     * @param string|null $path
     * @return string
     */
    private function uri(string $path = null)
    {
        if ($path && !Str::startsWith($path, "/")) $path = "/" . $path;
        return $this->endpoint[$this->env] . $this->entrypoint . $path;
    }
}
