<?php

namespace MfkSdk\Api;

class CustomerExaminationApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "customer_examinations";

    /**
     * 与信枠審査一覧取得
     * 与信枠審査の一覧を取得します。顧客IDやステータスで絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCustomerExaminationsList
     * 
     * @method GET 
     * @return array
     */
    public function index($body = []): array
    {
        return $this->get($body);
    }
}
