<?php

namespace App\Http\Controllers;

use Yansongda\Pay\Pay;
use Illuminate\Http\Request;
class PayController extends Controller
{
    protected $config = [
        'alipay' => [
            'app_id' => '2016101000654224',
            'notify_url' => 'http://localhost/laravel/blog/public/api/notify',
            'return_url' => 'http://localhost/laravel/blog/public/api/return',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA7PkMiT7yx15y/uZaUkbscEj2VN1f/0iKGs0/5sPTRS8gv21rsdEJeTcCBAwcdeR6eCPPdGcDOBzZEI5hqB+udbAigBlrfHwiDB+NKE/OdXIkh9fGDMPiO+WIMO+lhCkqo/MkJsJHRUUGsapxkTRElMrv4eLXhbXn0Kha3vAs8crH3YSltPBal+6AJeWF6TL/4yvAZHMTmg5Zzi9a1LNPLvJqAXswK4NkhBvH4dKkjyKxocMMcA0Poe2wDyWOqIOK2dkGEU4EWw/rdvA5mA1Q0pokG8TmC889snbwAGFWl+SyIr1V6zquedBJneEbwnXkW6qIZ09513ubUsZMJc8rjQIDAQAB',
            'private_key' =>
'MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDAhYn1++fnGoV2lq2LZvXDJq+nNVyERxAxsLHJpML2A9iTcRDoZvqyBfH4TWcCtWt8zAawxcDdX+Lxs1RwZmtF7FRnPY9F1BvJUn20TLH7m6ErpD1jyxiz8NrCvH5gRYVfhXLQQGuJ1+sEOWTG39aM7meNVb75vH1oqyBhh/sj4WZxc/EANGdaUpLjq1lnT88eUesAcd8xQV8JBMFMBCB8cwtKF+J74cugmA8ehXHsC+6qOy3civQmpdsbqGxzMpr2p9LrVLnEYnTu7I3nRuxLjlhq0ZBCsisRyIHlUzzp/DEPU6EtSqdLvfZzFIwblFMl5HBcZxlVyj5nrFZVU+OdAgMBAAECggEADDkuTjjlO24apTHh6OTrm61cH7CqpBdi9tSyJQxZ+Ia7/HiES00mg6EPAOXhMXHVVkIZ9qVHnoaVASWSqeRG0VS08y0caKGT9g9Pvd/UuRXjgMLXxvtBIUOckBqpp3Eii7MMXB6K9WCJImaGeH4DwETuvDGCg5atG7UpxCd/EYME7WztIFFFmV1khaV8bjo2wL+FItUmclXEp9iC+bD+NF3BROLV6BDjOiQQUOsc5DvYphraepNWn7kSTRk7xgITSRphFf4G5HpIBB66RIEfjxK9Lnu4JzNaDbZWq0HWajRkNGVcSt84keVPcwNwGyX5286WDcTCT4oSGoqaLMLOQQKBgQDhWscEoNsLRaEiAg/NiiFHZmUT8pJzmDXANq6zWmR8yLeLw5w/sV/u9YwGu0vJOisssiISvvzyuvrfRA22mpTVtUhxS5ya+G3grG7wZHxfNdlcuQVnwYIOlaUoCnDNsuF0yEvroIHqOhT5asRW5kXpqrSBJ0FDS1MVf2CPBYk+sQKBgQDas8Ehc8/cAspNr/UevRaZQUpsuDbUCQFYtVkkQ7K33Bgs3A5SM3q1C49L0ZKCxmGoMZeAS6WuDV7wY2otEG101TwOHQk3MMgwsJKCbRxfqxFwBakM8mwFCltQZ74YGFrBpKJmG8uKnMXCoGgiGY3XrvZ62DJxjesH5J9oHLpmrQKBgE2Wl5b8Wu5SltvCofY+bJ7Mnlhz2AB8k2UObq/Jm3drE+bG/nDffQwk9oUKz1kE8gB9hEW4BBb+UYm1QJNyPXQm6j43rj+c8Re9xqR1tGyDecb23OmQMlsbIrXagmQQBpfSrnD93jzqqnYFUHwq5D9DSsp83Xdx47UvGeukGFDBAoGAEylYrIOnHJGqA/B8u3q5tifAS5JAS4eWdJ0++CxuRimkfJmzL4SPJbmjjnMIMSkMeV4O9hCqrXtCbDFpphUgYfIk1t+4ZPuDLrDpxT+mEsO8PWJhk17SFAb6RSsxvo6ztO+lwuiAht6BfTHsrcAra1BLDCxRDx3uD7z6MncB5ekCgYB6sXfPfDf/kQkQXAPOIe5J84nZxHKf63mwarYjiwKoskp9zxfcAP4LPkZOSYJp1ggGWr8MaYdzkq+ElIXRjA6vOSNlxXzUV/fPpXW82FgO/CZ19kaY/fZDVItoIx3RC1PtPtWP1FvhFIBgFe3cafxfMrxKq5WYPEu9WoG2mLgOng==',
        ],
    ];
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['return','notify']]);
    }
    public function index(Request $request)
    {
        $config_biz = [
            'out_trade_no' => $request->input('order'),//订单号
            'total_amount' => $request->input('oid'),//总价
            'subject'      => 'test subject',
        ];

        $pay = new Pay($this->config);
        return $pay->driver('alipay')->gateway()->pay($config_biz);
    }
    public function return(Request $request)
    {
        header("location:http://localhost:8080/#/shop");
        $pay = new Pay($this->config);
        return $pay->driver('alipay')->gateway()->verify($request->all());
    }

    public function notify(Request $request)
    {
        $pay = new Pay($this->config);

        if ($pay->driver('alipay')->gateway()->verify($request->all())) {
            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况
            file_put_contents(storage_path('notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单号：' . $request->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);
        } else {
            file_put_contents(storage_path('notify.txt'), "收到异步通知\r\n", FILE_APPEND);
        }
        echo "success";
    }
}