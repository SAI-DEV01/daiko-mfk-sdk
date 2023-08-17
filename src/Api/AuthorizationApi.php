<?php

namespace MfkSdk\Api;

class AuthorizationApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "authorizations";

    /**
     * オーソリゼーション一覧取得
     * オーソリゼーション登録の一覧を取得します。顧客IDや番号で絞り込んで取得することもできます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetAuthorizationsList
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
     * オーソリゼーション登録
     * 顧客と金額を指定してオーソリゼーションを登録します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateAuthorization
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
     * オーソリゼーション取得
     * オーソリゼーションIDを指定して対象オーソリゼーション１件を取得することができます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetAuthorization
     *
     * @param string $authorization_id
     * @method GET
     * @return array
     */
    public function find(string $authorization_id): array
    {
        return $this->get(null, "{$authorization_id}");
    }

    /**
     * オーソリゼーションキャンセル
     * オーソリゼーションの状態によってはキャンセルができない場合もあります。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CancelAuthorization
     *
     * @param string $authorization_id
     * @method DELETE
     * @return array
     */
    public function cancel(string $authorization_id): array
    {
        return $this->delete([] ,"/{$authorization_id}");
    }
}
