<?php

namespace MfkSdk\Api;

class CreditFacilityApi extends AbstractApi
{
    /**
     * API エントリーポイント
     * @var string
     */
    protected $entrypoint = "credit_facilities";

    /**
     * 与信枠一覧取得
     * 与信枠の一覧を取得します。顧客IDや取引登録期間開始日・終了日で絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCreditFacilitiesList
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
     * 与信枠取得
     * 与信枠IDを指定して対象与信枠１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetCreditFacility
     *
     * @param string $credit_facility_id
     * @method GET
     * @return array
     */
    public function find(string $credit_facility_id): array
    {
        return $this->get(null, "{$credit_facility_id}");
    }
}
