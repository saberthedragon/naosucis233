<div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
        <form>
            <select wire:model="per_page">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="{{$perPageAll}}">All </option>
            </select>
        </form>
    </div>

    <input wire:model="search" type="text" placeholder="Search by Name OR Product Number" size="50" />
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">
                    <a href="#" wire:click="doSort('name', 'asc')">&uarr; </a>
                    Product name
                    <a href="#" wire:click="doSort('name', 'desc')">&darr; </a>
                </th>
                <th scope=" col">
                    <a href="#" wire:click="doSort('price', 'asc')">&uarr; </a>
                    Price
                    <a href=" #" wire:click="doSort('price', 'desc')">&darr; </a>
                </th>
                <th scope="col">
                    Item Number
                </th>
                <th scope="col">Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price), 2 }}</td>
                <td>{{ $product->item_number }}</td>
                <td>{{ $product->rating }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>