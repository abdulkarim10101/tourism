<select class="form-control js-select selectpicker dropdown-select" data-msg="Please select state."
    data-error-class="u-has-error" data-success-class="u-has-success" data-live-search="true"
    data-style="form-control border-color-1 font-weight-normal" name="state">
    <option value="">Select</option>
    @foreach ($states as $item)
        <option @if (auth()->user()->state == $item->name) selected @endif value="{{ $item->name }}">{{ $item->name }}</option>
    @endforeach
</select>
