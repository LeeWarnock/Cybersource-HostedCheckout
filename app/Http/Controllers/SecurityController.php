<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function sign($request)
    {
        return $this->signData($this->buildDataToSign($request), config('services.cybersource.skey'));
    }

    protected function signData($data, $secretKey)
    {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }

    protected function buildDataToSign($params)
    {
        $signedFieldNames = explode(",", $params["signed_field_names"]);
        foreach ($signedFieldNames as $field)
        {
            $dataToSign[] = $field . "=" . $params[$field];
        }
        return $this->commaSeparate($dataToSign);
    }

    protected function commaSeparate ($dataToSign)
    {
        return implode(",", $dataToSign);
    }
}
