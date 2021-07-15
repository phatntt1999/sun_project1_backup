<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class CreatePaymentController extends Controller
{
    public function createVnpPayment(Request $request)
    {
        $bookingId =
            dd($request->tourId);
        //return view('booking.vnp_payment');
    }

    public function handlePayment()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */
        $vnp_HashSecret = config('configPayment.vnp_HashSecret');
        $vnp_TxnRef = $_POST['order_id'];
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['totalPrice'] * 100 * 24000;
        $vnp_Locale = config('app.locale');
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => config('configPayment.vnp_TmnCode'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => config('configPayment.vnp_Returnurl'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = config('configPayment.vnp_Url') . "?" . $query;
        $vnp_ipnUrl = config('configPayment.vnp_ipnUrl') . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', config('configPayment.vnp_HashSecret') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url,
        );
        echo json_encode($returnData);
    }
}
