@extends('layouts.app')

@section('content')

<form id="payment_form" action="{{ route('unsigned') }}" method="post">
    @csrf
    <input type="hidden" name="access_key" value="a5354d7a647635a3877d38080ca6dc5d">
    <input type="hidden" name="profile_id" value="0AED55D6-3C4D-4C26-AB71-B3F17D8A0081">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code">
    <input type="hidden" name="unsigned_field_names">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25"><br />
            <span>reference_number:</span><input type="text" name="reference_number" size="25"><br />
            <span>amount:</span><input type="text" name="amount" size="25"><br />
            <span>currency:</span><input type="text" name="currency" size="25"><br />
        </div>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit" />
</form>

@endsection