# MFKSDK

```
composer install zushik/mfk-sdk:^1.0
```

# 使い方

```
$api = new MfkAPI({APIKEY});

$data = $api->customer()->get();
$data = $api->destination()->get();
```

# パッケージのアップデート
latest releseを作る

https://packagist.org/packages/zushik/mfk-sdk

updateボタン 