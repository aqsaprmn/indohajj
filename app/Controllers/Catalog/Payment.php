<?php

namespace App\Controllers\Catalog;

use App\Controllers\BaseController;
use App\Controllers\Catalog\Tripay;
use App\Models\PmCallback;
use App\Models\PmConfirm;
use App\Models\PuBooking;
use App\Models\PuPayment;
use App\Models\UserModel;
use App\Models\UserDataModel;
use CodeIgniter\HTTP\Request;

// use CodeIgniter\HTTP\Response;
// use CodeIgniter\HTTP\Request;
// use CodeIgniter\HTTP\RequestInterface;
// use LDAP\Result;
// use PHPUnit\Util\Json;
// #[AllowDynamicProperties]
class Payment extends BaseController
{
    protected $UsUser;
    protected $UsUserData;
    protected $PuBooking;
    protected $PuPayment;
    protected $tripay;
    protected $privateKey;
    protected $apiKey;
    protected $PmCallback;
    protected $PmConfirm;
    // protected $request;

    public function __construct()
    {
        $this->PuPayment = new PuPayment();
        $this->UsUser = new UserModel();
        $this->UsUserData = new UserDataModel();
        $this->PuBooking = new PuBooking();
        $this->PmCallback = new PmCallback();
        $this->PmConfirm = new PmConfirm();
        $this->privateKey = 'Us2XE-57pu1-npeoX-easPj-yvUVL';
        $this->apiKey = '1FLdGKk2NnSrp4Fgil6f4yw9yAm3E4ZBIeecTVH2';
        $this->tripay = new Tripay($this->privateKey, $this->apiKey);
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        // d($this->request->getBody);
        // dd((string)$this->request->getRawInput);
        $paymentaway = $this->request->getPost('payment');
        $kd_booking = $this->request->getPost('kd_booking');
        $harga = $this->request->getPost('harga');
        // dd($this->request->getPost());
        $pb = $this->PuBooking->where('kd_booking', $kd_booking)->first();
        $ud = $this->UsUserData->where('username', $pb['username'])->first();
        $us = $this->UsUser->where('username', $pb['username'])->first();

        //PRODUCTION
        //$privatekey = 'egm0P-EWMh3-wl5Ml-3Oexb-EZqBI'; // input your private key to here
        //$apikey = 'q5rMVQuOcnbNbKHCMuvvzlcMgDHIr6tYpJObH0Fv'; // input your api key to here
        //PRODUCTION telkomsel
        // input your private key to here
        // input your api key to here
        //SANDBOX
        //$privatekey = 'LTtma-0czeV-91mrF-JiGLK-EID8B'; // input your private key to here
        //$apikey = 'DEV-aRwCMTWG88nD4SC8e774lK5L8m01HEAufLHnbLdM'; // input your api key to here
        //SANDBOX riolegoh
        //$privatekey = 'bJSRM-rrqdt-wju2H-nAB7h-tGQPl'; // input your private key to here
        //$apikey = 'DEV-MEWNdw3AF7xU5K9UVdZjViQjlwYe36ei2EnTOvj1'; // input your api key to here
        // $tripay = new Tripay($privatekey, $apikey);

        $merchantCode = 'T17836'; // merchant code production telkomsel 
        //$merchantCode = 'T17833'; // merchant code sandbox riolegoh 
        //$merchantCode = 'T5766'; // merchant code production 
        //$merchantCode = 'T5682'; // merchant code sandbox

        $user_id = $pb['username'];
        $amount = $harga;
        //$amount = 1000;
        $fullname = $ud['name'];
        //r2(U.'prepaid/voucher-refill/'.$id, 'e', $amount.'-'.$user_id);
        $phonenumber = ($us['hp'] == "") ? $us['email'] : $us['hp'];
        $merchantRef = 'R' . date('YmdHis') . $user_id; // example code transaction in your merchant
        $data = [
            'method'            => 'QRIS2',
            'merchant_ref'      => $merchantRef,
            'amount'            => $amount,
            'customer_name'     => $fullname,
            'customer_email'    => 'cs@indohajj.com',
            'customer_phone'    => $phonenumber,
            'order_items'       => [
                [
                    'sku'       => 'SKU-0100',
                    'name'      => 'Pembayaran Reservasi Umrah',
                    'price'     => $amount,
                    'quantity'  => 1
                ]
            ],
            'callback_url'      => 'http://indohajj.com/indohajj/payment/callback',
            'return_url'        => 'http://indohajj.com/indohajj/informasiReservasi',
            'expired_time'      => (time() + (24 * 60 * 60)), // 24 jam
            // 'expired_time'      => (time() + (30 * 60)), // 24 jam
            'signature'         => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $this->privateKey)
        ];
        // dd($data);

        //SANDBOX create transaction
        //echo "testing";die;
        //$result = $tripay->curlAPI($tripay->URL_transMs, $data, 'post');
        //PRODUCTION create transaction
        $result = $this->tripay->curlAPI($this->tripay->URL_transMp, $data, 'post');
        // dd($result);
        //$result='{"success":false,"message":"Ada isinya.","data":{"reference":"Rio Legoh"}}';
        //$result="{\"success\":true,\"message\":\"Ada isinya.\",\"data\":{\"reference\":\"Rio Legoh\"}}";
        //$res1 = (string)$result;
        //$res1 = substr($res1, 1, strlen($res1)-2);

        $res1 = substr($result, 1, strlen($result) - 2);
        $res1 = str_replace('\\', '', $res1);
        // $res1 = explode('', $result);

        // dd($res1);

        $j_result = json_decode($res1);

        // dd($j_result);

        // echo $result;
        $message = $j_result->message;
        $request_status = '';
        $payment_ref_id = '';
        $payment_ref_merchant = '';
        $status = '';
        if ($j_result->success) {
            $request_status = 'SUKSES';
            $p_data = $j_result->data;
            $payment_ref_id = $p_data->reference;
            $payment_ref_merchant = $p_data->merchant_ref;
            $status = $p_data->status;
            $channel = $p_data->payment_method;
        } else {
            $request_status = 'GAGAL';
        }

        $dataPayment = [
            'kd_booking' => $kd_booking,
            'username' => $user_id,
            "request_status" => $request_status,
            'message' => $message,
            'status' => $status,
            'payment_ref_id' => $payment_ref_id,
            'payment_ref_merchant' => $payment_ref_merchant,
            'amount' => $amount,
            'channel' => $channel,
            'time_request' => date('Y-m-d H:i:s'),
            'payload_request' => $res1,
        ];


        // $insPayment = $this->PuPayment->save($dataPayment);

        // var_dump($payment_ref_id);
        // die;

        //r2(U.'prepaid/voucher-refill/'.$id, 'e', $res1.'-'.$user_id);
        // echo $payment_ref_id;
        // die;
        if ($request_status == 'SUKSES') {
            $insPayment = $this->PuPayment->save($dataPayment);
            if ($insPayment) {
                return redirect()->to('https://tripay.co.id/checkout/' . $payment_ref_id);
            } else {
                return redirect()->to(base_url() . '/umrah')->with('payment', 'gagalinput');
            }
        } else {
            return redirect()->to(base_url() . '/umrah')->with('payment', 'statusgagal');
        }

        // return redirect()->to('https://tripay.co.id/checkout/' . $payment_ref_id);
    }

    public function callback()
    {
        // return json_encode(['success' => true]);
        // die;
        $callbackSignature = $this->request->getServer('HTTP_X_CALLBACK_SIGNATURE');
        // $callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE'])
        //     ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE']
        //     : '';

        $json = file_get_contents('php://input');

        $signature = hash_hmac('sha256', $json, $this->privateKey);

        $ts = date('Y-m-d H:i:s');

        $dataCallback = [
            'callbackSignature' => $callbackSignature,
            'json' => $json,
            'signature' => $signature,
            'ts' => $ts
        ];

        $this->PmCallback->save([
            'payload' => $json,
            'received_date' => $ts
        ]);

        $data = json_decode($json);

        $this->PmConfirm->save([
            'payment_ref_id' => (string)$data->reference,
            'payment_ref_merchant' => (string)$data->merchant_ref,
            'payment_method' => (string)$data->payment_method,
            'payment_method_code' => (string)$data->payment_method_code,
            'total_amount' => (string)$data->total_amount,
            'fee_merchant' => (string)$data->fee_merchant,
            'fee_customer' => (string)$data->fee_customer,
            'total_fee' => (string)$data->total_fee,
            'amount_received' => (string)$data->amount_received,
            'is_closed_payment' => (string)$data->is_closed_payment,
            'status' => strtoupper((string)$data->status),
            'paid_at' => date('Y-m-d h:i:s', (string)$data->paid_at),
            'note' => (string)$data->note
        ]);

        if ($signature !== (string) $callbackSignature) {
            $this->PmCallback->save([
                'payload' => $signature . '-' . $callbackSignature,
                'received_date' => $ts
            ]);
            return json_encode([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $this->request->getServer('HTTP_X_CALLBACK_EVENT')) {
            $this->PmCallback->save([
                'payload' => 'bukan payment status',
                'received_date' => $ts
            ]);
            return json_encode([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        if (JSON_ERROR_NONE !== json_last_error()) {
            $this->PmCallback->save([
                'payload' => 'JSON ERROR NONE',
                'received_date' => $ts
            ]);
            return json_encode([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $uniqueRef = (string)$data->merchant_ref;
        $paymentRef = (string)$data->reference;
        $status = strtoupper((string)$data->status);

        if ($data->is_closed_payment == 1) {
            $invoice = $this->PuPayment->where(
                [
                    'payment_ref_id' => $paymentRef,
                    'payment_ref_merchant' => $uniqueRef,
                    'status' => 'UNPAID'
                ]
            )->first();

            if (!$invoice) {
                $this->PmCallback->save([
                    'payload' => 'INVOICE TIDAK DITEMUKAN',
                    'received_date' => $ts
                ]);
                return json_encode([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $uniqueRef,
                ]);
            }

            if ($status == "PAID") {
                $dataPayment  = [
                    'status' => $status,
                    'updated_time_callback' => $ts,
                    'updated_status_callback' => 'SUKSES',
                    'updated_payload_callback' => $json
                ];

                $updPay = $this->PuPayment->set($dataPayment)->where(
                    [
                        'payment_ref_id' => $paymentRef,
                        'payment_ref_merchant' => $uniqueRef,
                        'status' => 'UNPAID'
                    ]
                )->update();

                if (!$updPay) {
                    $this->PmCallback->save([
                        'payload' => 'update payment gaberes',
                        'received_date' => $ts
                    ]);

                    return json_encode([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
                }

                $updBook = $this->PuBooking->where('kd_booking', $invoice['kd_booking'])->set('status', 'Y')->update();

                if (!$updBook) {
                    $this->PmCallback->save([
                        'payload' => 'update booking gaberes',
                        'received_date' => $ts
                    ]);
                    return json_encode([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
                }
            } elseif ($status == "EXPIRED" || $status == "FAILED") {
                $dataPayment  = [
                    'status' => $status,
                    'updated_time_callback' => $ts,
                    'updated_status_callback' => 'SUKSES',
                    'updated_payload_callback' => $json
                ];

                $updPay = $this->PuPayment->where(
                    [
                        'payment_ref_id' => $invoice['payment_ref_id'],
                        'payment_ref_merchant' => $invoice['payment_ref_merchant'],
                        'status' => 'UNPAID'
                    ]
                )->set($dataPayment)->update();

                if (!$updPay) {
                    $this->PmCallback->save([
                        'payload' => 'update payment gaberes',
                        'received_date' => $ts
                    ]);

                    return json_encode([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
                }
            } else {
                $this->PmCallback->save([
                    'payload' => 'payment gaberes',
                    'received_date' => $ts
                ]);

                return json_encode([
                    'success' => false,
                    'message' => 'Unrecognized payment status',
                ]);
            }

            return json_encode(['success' => true]);
        }
    }
}
