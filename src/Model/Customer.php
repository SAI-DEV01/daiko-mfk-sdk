<?php

namespace MfkSdk\Model;

/**
 * 顧客です。
 * 取引登録や与信枠取得などあらゆる機能を利用する起点となります。
 * https://developer.mfkessai.co.jp/docs/v2/#customer-object
 */
class Customer
{
    /**
     * 顧客が登録された日時を示します。
     * @var string (date-time)
     */
    public $created_at;

    /**
     * アラートの有無を示します。アラートがある場合はtrue、ない場合はfalseを返します。アラートがあると、自動で毎月付与されている与信枠が停止します。
     * @var boolean
     */
    public $has_alert;

    /**
     * 顧客IDです。 Money Forward Kessaiによって発番される一意の識別子です。
     * @var string
     */
    public $id;

    /**
     * 顧客名です。
     * @var string
     */
    public $name;

    /**
     * 顧客に付与できる任意の顧客番号です。自動で付与される顧客IDとは別に、売り手様が独自に管理する識別子を登録することができます。ただし、売り手様の管理される顧客間で一意でなければなりません。
     * @var string
     */
    public $number;

    /**
     * このObjectの種別を示します。ここでは必ずcustomerが入ります。customer
     * @var string
     */
    public $object;

    /**
     * 顧客の支払方法です。口座振替(AccountTransfer)もしくは銀行振込(BankTransfer)のいずれかです。顧客の支払方法に応じたObjectが返却されます。 デフォルトでは銀行振込になっています。ただし、初回請求前には振込先口座が指定されていない場合があります。 口座振替に変更する場合には別途書面でのお手続きが必要であるため、サポートセンターへお問い合わせください。
     * @var PaymentMethod
     */
    public $payment_method;

    /**
     * 顧客URIです。すべてのリソースで一意の識別子として自動で付与されます。
     * @var string
     */
    public $uri;
}
