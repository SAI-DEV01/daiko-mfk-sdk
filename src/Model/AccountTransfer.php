<?php

namespace MfkSdk\Model;

/**
 * 口座振替に関する情報です。
 * お支払方法が口座振替の顧客のみ利用できます。
 * https://developer.mfkessai.co.jp/docs/v2/#schemaaccounttransfer
 */
class AccountTransfer
{
    /**
     * このObjectの種別を示します。ここでは必ずaccount_transferが入ります。account_transfer
     * @var string
     */
    public $object;
}
