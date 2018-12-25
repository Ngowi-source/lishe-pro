<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        return view ('shop.shop');
    }

    public function cart()
    {
        return view ('shop.cart');
    }

    public function iframe(Request $request)
    {
        include_once(app_path('Pesapal/OAuth.php'));

        //pesapal params
        $token = $params = NULL;
        $consumer_key = env('PESA_KEY');
        $consumer_secret = env('PESA_SECRET');
        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
        $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';

        //get form details
        $amount = $request->amount;
        $amount = number_format($amount, 2);//format amount to 2 decimal places

        $desc = $request->description;
        $type = $request->type; //default value = MERCHANT
        $reference = $request->reference;//unique order id of the transaction, generated by merchant
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phonenumber = $request->phone;//ONE of email or phonenumber is required

        $callback_url = 'https://lishep.herokuapp.com/pay_status'; //redirect url, the page that will handle the response from pesapal.

        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"https://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"https://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"https://www.pesapal.com\" />";
        $post_xml = htmlentities($post_xml);

        $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

        //post transaction to pesapal
        $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
        $iframe_src->set_parameter("oauth_callback", $callback_url);
        $iframe_src->set_parameter("pesapal_request_data", $post_xml);
        $iframe_src->sign_request($signature_method, $consumer, $token);

        return view ('shop.iframe', compact('iframe_src'));
    }
}
