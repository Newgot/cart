<h2>Общая сумма заказа: {{$sum}}</h2>

<table>
    <thead>
        <tr>
            <td>@lang('messages.name')</td>
            <td>@lang('messages.price')</td>
            <td>@lang('messages.count')</td>
            <td>@lang('messages.cost')</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <th>{{$product['name']}}</th>
                <th>{{$product['price']}} @lang('messages.currency')</th>
                <th>{{$product['quantity']}}</th>
                <th>{{$product['price'] * $product['quantity']}} @lang('messages.currency')</th>
            </tr>
        @endforeach
    </tbody>
</table>