<?php

namespace MfkSdk\Api;

class BillingApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "billings";

    /**
     * 請求一覧取得
     * 区分記載請求書等保存方式に対応した請求一覧を取得します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetBillingsList
     *
     * @param array $body
     * @method GET
     * @return array
     */
    public function index(array $body = []): array
    {
        return $this->get($body);
    }
}
