<?php

namespace MfkSdk;

use MfkSdk\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class MfkServiceTest
{
    private $endpoint = "https://sandbox-api.mfkessai.co.jp/v2/";

    private $entrypoint = "customers";

    protected $client;

    protected $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'apikey' => "uuFiotB3miPUyZ1c04PzUKmzCLT9rbsX", // 取引代行
            // 'apikey' => "d3Ln39DO1rHmiiZceABIHAwPdQMpcFOa", // 請求代行
        ];
        session_start();
    }

    public function index()
    {
        $this->registerCustomer();
        // $this->examinationCustomer();
        // $this->check();
        // $this->transaction();
        // $this->checkReciept();
    }

    private function registerCustomer()
    {
        // Define array of request body.
        $rand = Str::random();
        $request_body = [
            "name" => "{$rand}顧客",
            "number" => $rand,
            "destination" => [
                "address1" => "東京都千代田区1-2-3",
                "address2" => "{$rand}ビル3F",
                "cc_emails" => [
                    "another.tanto1@example.jp",
                    "another.tanto2@example.jp"
                ],
                "department" => "経理部",
                "email" => "kesai.tanto@example.jp",
                "name" => "担当　太郎",
                "name_kana" => "タントウ　タロウ",
                "tel" => "03-1234-5678",
                "title" => "部長",
                "zip_code" => "111-1111"
            ],
        ];

        try {
            $response = $this->client->request(
                'POST',
                $this->endpoint . $this->entrypoint,
                [
                    'headers' => $this->headers,
                    'json' => $request_body,
                ]
            );
            $a = json_decode($response->getBody(), true);
            $_SESSION["customer_id"] = $a["customer"]["id"];
            $_SESSION["destination_id"] = $a["destination"]["id"];
            echo '<pre>';
            var_dump($a);
            echo '</pre>';
        } catch (BadResponseException $e) {
            print_r($e->getMessage());
        }
    }

    private function examinationCustomer()
    {
        // Define array of request body.
        $request_body = [
            "customer_id" => $_SESSION["customer_id"],
            "address1" => "東京都千代田区1-2-3",
            "address2" => "サンプルビル3F",
            "amount" => 2000000,
            "business_description" => "クラウド型企業間決済サービス",
            "business_type" => "corporate",
            "corporate_number" => "1234567890123",
            "email" => "kesai.tanto@example.jp",
            "end_date" => date("Y-m-d", strtotime("last day of next month")),
            "remark" => "__passed__",
            "representative_name" => "代表太郎",
            "tel" => "03-1234-5678",
            "website" => "https://mfkessai.co.jp",
            "zip_code" => "111-1111"
        ];

        try {
            $response = $this->client->request(
                'POST',
                $this->endpoint . "customer_examinations",
                array(
                    'headers' => $this->headers,
                    'json' => $request_body,
                )
            );
            $a = json_decode($response->getBody(), true);
            $_SESSION["examination_id"] = $a["id"];
            echo '<pre>';
            var_dump($a);
            echo '</pre>';
        } catch (BadResponseException $e) {
            // handle exception or api errors.
            print_r($e->getMessage());
        }
    }


    public function check()
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://sandbox-api.mfkessai.co.jp/v2/credit_facilities?customer_id=' . $_SESSION["customer_id"],
                ['headers' => $this->headers]
            );
            $a = json_decode($response->getBody(), true);
            echo '<pre>';
            var_dump($a);
            echo '</pre>';
        } catch (BadResponseException $e) {
            // handle exception or api errors.
            print_r($e->getMessage());
        }
    }

    public function transaction()
    {
        $request_body = array(
            "destination_id" => $_SESSION["destination_id"],
            "number" => Str::random(),
            "amount" => 13140,
            "amounts_per_tax_rate_type" => array(
                array(
                    "amount" => 9900,
                    "tax_rate_type" => "normal_10"
                ),
                array(
                    "amount" => 3240,
                    "tax_rate_type" => "reduced_8"
                )
            ),
            "date" => date("Y-m-d"),
            "issue_date" => date("Y-m-d"),
            "due_date" => date("Y-m-d", strtotime("last day of this month")),
            "invoice_delivery_methods" => array(
                "posting",
                "email"
            ),
            "transaction_details" => array(
                array(
                    "amount" => 10000,
                    "description" => "__passed__",
                    "tax_included_type" => "excluded",
                    "tax_rate_type" => "normal_10",
                    "quantity" => 10,
                    "unit_price" => 1000
                ),
                array(
                    "amount" => 3000,
                    "description" => "__passed__",
                    "tax_included_type" => "excluded",
                    "tax_rate_type" => "reduced_8",
                    "quantity" => 3,
                    "unit_price" => 1000
                ),
                array(
                    "amount" => -1000,
                    "description" => "__passed__",
                    "tax_included_type" => "excluded",
                    "tax_rate_type" => "normal_10",
                    "quantity" => 1,
                    "unit_price" => -1000
                )
            )
        );

        try {
            $response = $this->client->request(
                'POST',
                'https://sandbox-api.mfkessai.co.jp/v2/transactions',
                array(
                    'headers' => $this->headers,
                    'json' => $request_body,
                )
            );
            $a = json_decode($response->getBody(), true);
            $_SESSION["billing_id"] = $a["billing_id"];
            $_SESSION["transaction_id"] = $a["id"];
            echo '<pre>';
            var_dump($a);
            echo '</pre>';
        } catch (BadResponseException $e) {
            // handle exception or api errors.
            print_r($e->getMessage());
        }
    }

    public function checkReciept()
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://sandbox-api.mfkessai.co.jp/v2/billings/' .  $_SESSION["billing_id"],
                ['headers' => $this->headers]
            );
            $a = json_decode($response->getBody(), true);
            echo '<pre>';
            var_dump($a);
            echo '</pre>';
        } catch (BadResponseException $e) {
            // handle exception or api errors.
            print_r($e->getMessage());
        }
    }
}
