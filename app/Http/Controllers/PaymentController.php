<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SecurityController;

class PaymentController extends Controller
{
    public function signedDataFields()
    {
        return view('signeddatafields');
    }

    public function unsignedDataFields(Request $request)
    {
        $security = new SecurityController();
        $sign = $security->sign($request);
        $fields = [
            "_token" => $request->_token,
            "access_key" => $request->access_key,
            "profile_id" => $request->profile_id,
            "transaction_uuid" => $request->transaction_uuid,
            "signed_field_names" => $request->signed_field_names,
            "unsigned_field_names" => $request->unsigned_field_names,
            "signed_date_time" => $request->signed_date_time,
            "locale" => $request->locale,
            "transaction_type" => $request->transaction_type,
            "reference_number" => $request->reference_number,
            "amount" => $request->amount,
            "currency" => $request->currency,
            "payment_method" => $request->payment_method,
            "bill_to_forename" => $request->bill_to_forename,
            "bill_to_surname" => $request->bill_to_surname,
            "bill_to_email" => $request->bill_to_email,
            "bill_to_phone" => $request->bill_to_phone,
            "bill_to_address_line1" => $request->bill_to_address_line1,
            "bill_to_address_city" => $request->bill_to_address_city,
            "bill_to_address_state" => $request->bill_to_address_state,
            "bill_to_address_country" => $request->bill_to_address_country,
            "bill_to_address_postal_code" => $request->bill_to_address_postal_code,
        ];
        return view('unsigneddatafields', ['fields' => $fields], ['sign' => $sign]);
    }
}
