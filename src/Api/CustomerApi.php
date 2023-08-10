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
    public function getCustomer()
    {
        return $this->get();
    }
}
