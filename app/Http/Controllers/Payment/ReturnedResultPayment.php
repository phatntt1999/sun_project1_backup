<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnedResultPayment extends Controller
{
    public function returnResultPayment()
    {
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        //$secureHash = md5($vnp_HashSecret . $hashData);
        $secureHash = hash('sha256', config('configPayment.vnp_HashSecret') . $hashData);

        return view('booking.vnp_response', [
            'vnp_TxnRef' => $_GET['vnp_TxnRef'],
            'vnp_Amount' => $_GET['vnp_Amount'],
            'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
            'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
            'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
            'vnp_BankCode' => $_GET['vnp_BankCode'],
            'vnp_PayDate' => $_GET['vnp_PayDate'],
            'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
            'vnp_SecureHash' => $vnp_SecureHash,
            'secureHash' => $secureHash,
        ]);
    }
}
