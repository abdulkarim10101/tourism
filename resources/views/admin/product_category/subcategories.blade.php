<div class="card-body table-responsive p-0">
    <table class="table  table-hover text-nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Products</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category->children as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{route('products.index')}}?category={{$item->name}}">{{ optional($item->products)->count() }}</a></td>
                <td>
                    <a href="{{ route('categories.edit', $item->id) }}" class="float-left"><i
                            class="fas fa-edit"></i></a>
                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                        @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                class="fas fa-trash-alt"></i></button> </form>
                </td>
            </tr>
        @empty
            <p>No Data Found</p>
        @endforelse

        </tbody>
    </table>
    {{-- <div class="align-right paginationstyle">
        {{ $categories->links() }}
    </div> --}}
</div>
