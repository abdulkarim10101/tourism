@forelse ($users as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td><img class="rounded-circle  " style="height: 50px;width: 50px;"
                src="{{ asset('images/userdp/default.png') }}" id="dpuser"></td>
        {{-- <td>{{ $item->firebase_id }}</td> --}}
        {{-- <td>{{ $item->role->name }}</td> --}}
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        {{-- <td>{{ $item->status }}</td> --}}
        <td>{{ $item->phone }}</td>

        
        <td>{{ optional($item)->created_at->diffForHumans() }}</td>

        <td>
            <a href="{{ route('users.edit', $item->id) }}" class="float-left"><i class="fas fa-edit"></i></a>
            <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                @method('delete') @csrf <button class="btn btn-link pt-0"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>


    </tr>
@empty
    <p>No Data Found</p>
@endforelse
