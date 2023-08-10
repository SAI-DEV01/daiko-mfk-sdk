<?php

namespace MfkSdk;

abstract class AbstractClass
{
    /**
     * API エンドポイント
     *
     * @var array
     */
    private $endpoint = [
        "production" => "https://api.mfkessai.co.jp/v2/",
        "sandobox" => "https://sandbox-api.mfkessai.co.jp/v2/"
    ];
}
