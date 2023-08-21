<?php

namespace MfkSdk\Api;

class TransactionApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "transactions";

    /**
     * 取引一覧取得
     * 取引の一覧を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetTransactionsList
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
     * 取引登録
     * 請求先を指定して取引を登録できます。最長で申請後2営業日以内に審査いたします。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateTransaction
     *
     * @param array $body
     * @method POST
     * @return array
     */
    public function create(array $body): array
    {
        return $this->post($body);
    }

    /**
     * 取引取得
     * 取引IDを指定して対象取引１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetTransaction
     *
     * @param string $transaction_id
     * @method GET
     * @return array
     */
    public function find(string $transaction_id): array
    {
        return $this->get(null, "{$transaction_id}");
    }

    /**
     * 取引キャンセル
     * 取引IDを指定して対象取引１件をキャンセルすることができます。取引の状態によってはキャンセルができない場合もあります。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CancelTransaction
     *
     * @param string $transaction_id
     * @method GET
     * @return array
     */
    public function cancel(string $transaction_id): array
    {
        return $this->delete([], "{$transaction_id}");
    }
}
