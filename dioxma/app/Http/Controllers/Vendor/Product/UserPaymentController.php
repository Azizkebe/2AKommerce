<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PaymentGateway;
use Illuminate\Support\Str;
use App\Helpers\CinetPay;


class UserPaymentController extends Controller
{
    public function initPayment(int $id)
    {
        $Productinfo = Product::findOrFail($id);
        $notify_url = 'http://localhost:8000/product/order/{$id}';
        $return_url = 'http://localhost:8000/product/order/{$id}';

        $paymentData = array(
            "transaction_id"=> Str::random(40),
            "amount"=> $Productinfo->price,
            "currency"=> 'XOF',
            "customer_surname"=> 'AZIZ',
            "customer_name"=> 'KEBE',
            "description"=> 'paiement',
            "notify_url" => $notify_url,
            "return_url" => $return_url,
            "channels" => 'ALL',
            "metadata" => "", // utiliser cette variable pour recevoir des informations personnalisés.
            "alternative_currency" => "",//Valeur de la transaction dans une devise alternative
            //Fournir ces variables obligatoirement pour le paiements par carte bancaire
            "customer_email" => "", //l'email du client
            "customer_phone_number" => "", //Le numéro de téléphone du client
            "customer_address" => "", //l'adresse du client
            "customer_city" => "", // ville du client
            "customer_country" => "",//Le pays du client, la valeur à envoyer est le code ISO du pays (code à deux chiffre) ex : CI, BF, US, CA, FR
            "customer_state" => "", //L’état dans de la quel se trouve le client. Cette valeur est obligatoire si le client se trouve au États Unis d’Amérique (US) ou au Canada (CA)
            "customer_zip_code" => "" //Le code postal du client
        );

        $paymentSourceInfo = PaymentGateway::where('vendor_id', $Productinfo->vendor_id)->first();
        $CinetPay = new CinetPay($paymentSourceInfo->SITE_ID,$paymentSourceInfo->API_KEY);

        $result = $CinetPay->generatePaymentLink($paymentData);

        $url = $result['data']['payment_url'];

        return redirect()->to($url);
    }
}
