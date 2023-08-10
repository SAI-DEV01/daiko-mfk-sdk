<?php

namespace MfkSdk\Api;

class CustomerApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "customers";

    /**
     * 顧客一覧取得
     * 顧客の一覧を取得することができます。顧客番号や支払方法、未入金の有無で絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/#GetCustomersList
     * 
     * @method GET 
     * @return array
     */
    public function index($body = []): array
    {
        return $this->get($body);
    }

    /**
     * 顧客一覧取得
     * 顧客の一覧を取得することができます。顧客番号や支払方法、未入金の有無で絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/#GetCustomersList
     * 
     * @method POST 
     * @return array
     */
    public function create($body): array
    {
        return $this->post($body);
    }

    /**
     * 顧客取得
     * 顧客IDを指定して対象顧客１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCustomer
     */
    public function find($customer_id): array
    {
        return $this->get(null, "{$customer_id}");
    }

    /**
     * 顧客更新
     * 顧客の情報を更新することができます。
     */
    public function update($body, $customer_id): array
    {
        return $this->patch($body, "/{$customer_id}");
    }

    /**
     * 振込先口座割り当て
     * 対象顧客１件に振込先口座番号を未割り当ての場合、割り当てます。
     */
    public function transfer($body, $customer_id): array
    {
        return $this->post($body, "{$customer_id}/bank_transfer");
    }
}
