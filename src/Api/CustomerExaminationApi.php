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

    /**
     * 与信枠審査申請
     * 顧客を指定して与信枠審査を申請することができます。最長で申請後2営業日以内に審査。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateCustomerExamination
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
     * 与信枠審査取得
     * 与信枠審査IDを指定して対象与信枠審査１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCustomerExamination
     *
     * @param string $customer_examination_id
     * @method GET
     * @return array
     */
    public function find(string $customer_examination_id): array
    {
        return $this->get(null, $customer_examination_id);
    }
}
