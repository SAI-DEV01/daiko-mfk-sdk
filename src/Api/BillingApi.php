<?php

namespace MfkSdk\Api;

class BillingApi extends AbstractApi
{
    /**
     * API エントリーポイント
     *
     * @var string
     */
    protected $entrypoint = "billings";

    /**
     * 請求一覧取得
     * 区分記載請求書等保存方式に対応した請求一覧を取得します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetBillingsList
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
     * インボイス（適格請求書）請求一覧取得
     * インボイス制度（適格請求書等保存方式）に対応した請求一覧を取得します。
     * 請求対象の取引がなくなった請求や、審査中の取引のみを含む請求も含まれます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetBillingsListForQualified
     *
     * @param array $body
     * @method GET
     * @return array
     */
    public function qualifiedIndex(array $body = []): array
    {
        return $this->get($body, "/qualified");
    }

    /**
     * 請求取得
     * 請求IDを指定して請求を取得します。
     * インボイス（適格請求書）モードでは請求対象の取引がなくなった請求や、審査中の取引のみを含む請求も取得できます。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetBilling
     *
     * @param string $billing_id
     * @method GET
     * @return array
     */
    public function find(string $billing_id): array
    {
        return $this->get(null, "{$billing_id}");
    }

    /**
     * 請求書・口座振替通知書兼請求書再発行
     * 指定した請求に対する請求書または口座振替通知書兼請求書を再発行します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#ReissueBilling
     *
     * @param array $body
     * @param string $billing_id
     * @method POST
     * @return array
     */
    public function reissue(array $body, string $billing_id): array
    {
        return $this->post($body, "{$billing_id}/reissue");
    }

    /**
     * 請求付記ファイルアップロードのための署名付きURL発行
     * 指定した請求に対する付記ファイルをアップロードするための署名付きURLを発行します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateUploadSignedUrl
     *
     * @param array $body
     * @param string $billing_id
     * @method POST
     * @return array
     */
    public function createUploadSignedUrl(array $body, string $billing_id): array
    {
        return $this->post($body, "{$billing_id}/upload_signed_url");
    }

    /**
     * 発行済請求情報一覧取得
     * 請求IDを指定して発行済請求情報一覧を取得します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#GetIssuesList
     *
     * @param string $billing_id
     * @method GET
     * @return array
     */
    public function issuesIndex(string $billing_id): array
    {
        return $this->get(null, "{$billing_id}");
    }

    /**
     * 請求ファイルダウンロードのための署名付きURL発行
     * 指定した発行済み請求書ファイルまたは口座振替通知書ファイルをダウンロードするための署名付きURLを発行します。
     * https://developer.mfkessai.co.jp/docs/v2/?php#CreateDownloadSignedUrl
     *
     * @param string $billing_id
     * @param string $issue_id
     * @method GET
     * @return array
     */
    public function createDownloadSignedUrl(string $billing_id, string $issue_id): array
    {
        return $this->post([], "{$billing_id}/issues/{$issue_id}/download_signed_url");
    }
}
