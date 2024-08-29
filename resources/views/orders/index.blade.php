@extends('layouts.app')

@section('content')
<!-- Search Field -->
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-700">Orders Listing</h1>
    <form method="GET" action="{{ route('customer.index') }}" class="flex">
        <div class="mb-4">
            <input
                type="text"
                name="search"
                value="{{$search ?? ''}}"
                placeholder="Search..."
                class="border border-gray-300 rounded-lg p-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>
        <button type="submit" class="ml-2 bg-green-400 mb-4 text-white px-3 py-1 rounded-lg">Search</button>
    </form>
</div>

<!-- Listing Section -->
<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <tr>
            <th class="py-3 px-6 text-left">Order Number</th>
            <th class="py-3 px-6 text-left">Customer Name</th>
            <th class="py-3 px-6 text-left">Email</th>
            <th class="py-3 px-6 text-left">Product listing</th>
            <th class="py-3 px-6 text-center">Order Date</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">

        @forelse($orders as $order)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $order->order_number }}</td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $order->customer->name }}</td>
                    <td class="py-3 px-6 text-left">{{ $order->customer->email }}</td>
                    <td class="py-3 px-6 text-left">{{ implode(',', $order->items->pluck('product_name')->toArray()) }}</td>
                    <td class="py-3 px-6 text-center">{{ $order->order_date }}</td>
                </tr>
        @empty
            <tr>
                <td colspan="12" class="py-3 px-6 text-center">No customers found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3">
    {{ $orders->links() }}
</div>

@endsection
