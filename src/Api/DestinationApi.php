<?php

namespace MfkSdk\Api;

class DestinationApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "destinations";

    /**
     * 請求先一覧取得
     * 請求先の一覧を取得します。顧客IDや顧客番号で特定の顧客に紐づく請求先に絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetDestinationsList
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
     * 請求先登録
     * 顧客を指定して請求先を登録することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateDestination
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
     * 請求先取得
     * 請求先IDを指定して対象請求先１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetDestination
     *
     * @param string $destination_id
     * @method GET
     * @return array
     *
     */
    public function find(string $destination_id): array
    {
        return $this->get(null, "{$destination_id}");
    }

    /**
     * 請求先更新
     * 請求先の情報を更新することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#UpdateDestination
     *
     * @param array $body
     * @param string $destination_id
     * @method PUT
     * @return array
     *
     */
    public function update(array $body, string $destination_id): array
    {
        return $this->put($body, "/{$destination_id}");
    }
}
