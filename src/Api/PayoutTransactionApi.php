<?php

namespace MfkSdk\Api;

class PayoutTransactionApi extends AbstractApi
{
    /**
     * API エントリーポイント
     * @var string
     */
    protected $entrypoint = "payout_transactions";

    /**
     * 債券一覧取得
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetPayoutTransactionsList
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
     * 債券取得
     * 債券IDを指定して対象債券１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetPayoutTransaction
     *
     * @param string $payout_transaction_id
     * @method GET
     * @return array
     */
    public function find(string $payout_transaction_id): array
    {
        return $this->get(null, "{$payout_transaction_id}");
    }
}
