<?php

namespace MfkSdk\Model;

/**
 * 顧客の支払方法です。
 * 口座振替(AccountTransfer)もしくは銀行振込(BankTransfer)のいずれかです。
 * 顧客の支払方法に応じたObjectが返却されます。 デフォルトでは銀行振込になっています。
 * ただし、初回請求前には振込先口座が指定されていない場合があります。
 * 口座振替に変更する場合には別途書面でのお手続きが必要であるため、サポートセンターへお問い合わせください。
 * https://developer.mfkessai.co.jp/docs/v2/#schemapaymentmethod
 */
class PaymentMethod
{
    /**
     * 口座振替に関する情報です。お支払方法が口座振替の顧客のみ利用できます。
     * @var AccountTransfer
     */
    public $account_transfer;

    /**
     * 銀行振込に関する情報です。お支払方法が銀行振込の顧客のみ利用できます。 初回請求前は振込先口座が未割当のため、object以外は空で返却されます。
     * @var BankTransfer
     */
    public $bank_transfer;

    /**
     * このObjectの種別を示します。ここでは必ずpayment_methodが入ります。payment_method
     * @var string
     */
    public $object;
}
