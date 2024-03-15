<select class="form-control js-select selectpicker dropdown-select"  data-msg="Please select city."
    data-error-class="u-has-error" data-success-class="u-has-success" data-live-search="true"
    data-style="form-control border-color-1 font-weight-normal" name="city">
    <option value="">Select</option>
    @foreach ($cities as $item)
        <option @if (auth()->user()->city == $item->name) selected @endif value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>
