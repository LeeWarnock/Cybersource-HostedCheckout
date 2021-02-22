@extends('layouts.app')

@section('content')
<form id="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post">
    @csrf
    <fieldset id="confirmation">
        @foreach($fields as $key => $field)
        <div>
            <span><strong>{{ $key }}: </strong></span></br>
            <spana>{{ $field }}</span>
        </div>
        @endforeach
    </fieldset>
    @foreach($fields as $key => $field)
    <input type="hidden" id="{{ $key }}" name="{{ $key }}" value="{{ $field }}" />
    @endforeach
    <input type="hidden" id="signature" name="signature" value="{{ $sign }}" />
    <input type="submit" id="submit" value="Confirm " />
</form>

@endsection