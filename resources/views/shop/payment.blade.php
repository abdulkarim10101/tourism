<link rel="stylesheet" href="{{ asset('/stripe/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>

@if ($message = Session::get('success'))
    <div class="success">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="error">
        <strong>{{ $message }}</strong>
    </div>
@endif

    <div id="payment-form" class="mt-2">
    <div class="form-row">

        <div id="card-element" style="width: 100%">
        <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    {{ csrf_field() }}
</div>
<script>
var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
</script>
<script src="{{ asset('js/card.js') }}"></script>
<style>
    iframe {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
</style>
