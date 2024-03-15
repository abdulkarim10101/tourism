@forelse ($vendors as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td><img class="rounded-circle  " style="height: 50px;width: 50px;"
                src="{{ asset('images/userdp/default.png') }}" id="dpuser"></td>
        <td>{{ $item->brand_name }}</td> --}}
         <td>{{ $item->phone }}</td>
        <td>{{ $item->mobile }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->active }}</td>
        <td>{{ $item->website_url }}</td>
        <td>{{ $item->bank_name }}</td>
        <td>{{ $item->bank_account_number }}</td>


        {{-- <td>

            <div class="col-sm-2">
                <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

                {{-- <input id="status{{ $item->id }}" type="hidden" class="toggle "
                    onclick="statusToggle('{{ $item->id }}')" name="locked" value="0"> --}}
                {{-- <label class="switch">
                    <input id="status{{ $item->id }}" @if ($item->status == 1) checked @endif onclick="statusToggle('{{ $item->id }}')"
                        type="checkbox" name="locked" value="1">
                    <span></span>
                </label>
            </div>

        </td> --}}
        <td>{{ optional($item)->created_at->diffForHumans() }}</td>

        <td>
            <a href="{{ route('vendors.edit', $item->id) }}" class="float-left"><i class="fas fa-edit"></i></a>
            <form action="{{ route('vendors.destroy', $item->id) }}" method="POST">
                @method('delete') @csrf <button class="btn btn-link pt-0"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>


    </tr>
@empty
    <p>No Data Found</p>
@endforelse
