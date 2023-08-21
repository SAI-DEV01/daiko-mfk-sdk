<?php

namespace MfkSdk\Api;

class PayoutApi extends AbstractApi
{
    /**
     * API エントリーポイント
     * @var string
     */
    protected $entrypoint = "payouts";

    /**
     * 振込一覧取得
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetPayoutsList
     *
     * @param array $body
     * @method GET
     * @return array
     */
    public function index(array $body = []): array
    {
        return $this->get($body);
    }

    /**
     * 振込取得
     * 振込IDを指定して対象振込１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetPayout
     *
     * @param string $payout_id
     * @method GET
     * @return array
     */
    public function find(string $payout_id): array
    {
        return $this->get(null, "{$payout_id}");
    }
}
