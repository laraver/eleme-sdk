# eleme-sdk
饿了么 SDK

## 安装

`composer require laraver/eleme-sdk:dev-master`

## 文档

### 实例化

```php

$eleme = new Eleme([
    'app_id' => '',
    'secret' => '',
    $url = $this->eleme->oauth->pre_auth->request($callbackUrl)->getTargetUrl();
    'debug'  => true,
    'log' => [
        'file' => storage_path('logs/eleme.log'),
        'level'      => 'debug',
        'permission' => 0777,
    ]
]);
```

### 获取授权链接

```
$url = $eleme->oauth->pre_auth->request($callbackUrl)->getTargetUrl();
```

### 获取授权门店

```
$accessToken = $eleme->oauth->getToken();

$eleme = $eleme->oauth->createAuthorizerApplication($accessToken['access_token']);

// 获取门店信息
$response = $eleme->user->getUser();
```

### 获取门店的实例

```
$eleme = $eleme->oauth->createAuthorizerApplication($access_token);
```

### 其他实例

```
// 订单实例
$order = $eleme->order;

```

PS: 其他请参考 https://github.com/hanson/eleme-sdk/blob/master/src/Eleme.php 中的备注

