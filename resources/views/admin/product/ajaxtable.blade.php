<div>
    @forelse ($products as $key=>$item)

        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->category->name }}</td>
            <td><a target="_blank" href="{{route('shop.productdetail',$item->slug)}}">{{ $item->name }}</a></td>
            <td>{{ $item->sku }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->featured ? 'Yes' : 'No'}}</td>
            <td>{{ $item->slug }}</td>
            <td>{{ $item->status ? 'Active' : 'In-Active' }}</td>
            <td>{{ $item->in_stock ? 'Yes' : 'No' }}</td>
            <td>{{ $item->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('products.edit', $item->id) }}" class="float-left"><i
                        class="fas fa-edit"></i></a>
                <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                    @method('delete') @csrf <button class="btn btn-link pt-0"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>Data Not Found</tr>
    @endforelse
