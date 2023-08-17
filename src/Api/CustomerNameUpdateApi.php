<?php

namespace MfkSdk\Api;

class CustomerNameUpdateApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "customer_name_updates";

    /**
     * 顧客名変更申請一覧取得
     * 顧客名変更申請の一覧を取得します。顧客IDやステータスで絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCustomerNameUpdatesList
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
     * 顧客名変更申請登録
     * 顧客と変更希望の顧客名を指定して顧客名変更申請を登録することができます。通常、申請後2営業日以内に審査。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateCustomerNameUpdate
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
     * 顧客名変更申請取得
     * 顧客名変更申請IDを指定して対象顧客名変更申請１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCustomerNameUpdate
     *
     * @param string $customer_name_update_id
     * @method GET
     * @return array
     *
     */
    public function find(string $customer_name_update_id): array
    {
        return $this->get(null, "{$customer_name_update_id}");
    }

    /**
     * 顧客名変更申請キャンセル
     * 顧客名変更申請IDを指定して対象顧客名変更申請をキャンセルすることができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CanceledCustomerNameUpdate
     *
     * @param string $customer_name_update_id
     * @method DELETE
     * @return array
     *
     */
    public function cancel(string $customer_name_update_id): array
    {
        return $this->delete([] ,"/{$customer_name_update_id}");
    }
}
