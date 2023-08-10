<?php

namespace MfkSdk\Model;

/**
 * 銀行振込に関する情報です。お支払方法が銀行振込の顧客のみ利用できます。
 * 初回請求前は振込先口座が未割当のため、object以外は空で返却されます。
 * https://developer.mfkessai.co.jp/docs/v2/#customer-object
 */
class BankTransfer
{
    /**
     * @var string
     * 振込先口座番号です。未割当の場合は空で返却されます。
     */
    public $account_number;

    /**
     * @var string
     * 振込先銀行コードです。未割当の場合は空で返却されます。
     */
    public $bank_code;

    /**
     * @var string
     * 振込先銀行名です。未割当の場合は空で返却されます。
     */
    public $bank_name;

    /**
     * @var string
     * 振込先銀行名フリガナです。未割当の場合は空で返却されます。
     */
    public $bank_name_kana;

    /**
     * @var string
     * 振込先銀行支店コードです。未割当の場合は空で返却されます。
     */
    public $branch_code;

    /**
     * @var string
     * 振込先銀行支店名です。未割当の場合は空で返却されます。
     */
    public $branch_name;

    /**
     * @var string
     * 振込先銀行支店名フリガナです。未割当の場合は空で返却されます。
     */
    public $branch_name_kana;

    /**
     * @var string
     * このObjectの種別を示します。ここでは必ずbank_transferが入ります。 bank_transfer
     */
    public $object;

    /**
     * @var string
     * 振込先口座種別です。current(当座)、saving(普通)の2種類のうちどちらかになります。未割当の場合は空で返却されます。値は以下のうちの一つになります。current saving
     */
    public $type;

    /**
     * @var string
     * 振込先口座名義です。必ずﾏﾈ-ﾌｵﾜ-ﾄﾞｹﾂｻｲ(ｶになります。未割当の場合は空で返却されます。
     */
    public $holder_name;
}
