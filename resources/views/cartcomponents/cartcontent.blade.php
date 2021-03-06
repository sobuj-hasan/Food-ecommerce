<table class="table">
    <thead>
        <tr>
            <th scope="col">@lang('home.serial_number')</th>
            <th scope="col">@lang('home.image')</th>
            <th scope="col">@lang('home.product_name') </th>
            <th scope="col">@lang('home.size')</th>
            <th scope="col">@lang('home.price')</th>
            <th scope="col">@lang('home.discount')</th>
            <th scope="col">@lang('home.quantity')</th>
            <th scope="col">@lang('home.subtotal')</th>
            <th scope="col">@lang('home.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Cart::content() as $cartproduct)
            <tr class="align-middle">
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td class=""><img width="100" src="{{ asset('assets/img/food/') }}/{{ $cartproduct->options->image }}" alt="cart-img"></td>
                <td class="">
                    <span class="name">{{ $cartproduct->name }}</span>
                    {{-- <span>Restaurant name</span> --}}
                </td>
                <td class="text-start">
                    <p class="d-inline-block">FULL</p>
                </td>
                <td class="text-start">
                    <p class="d-inline-block">SAR {{ $cartproduct->price }}</p>
                </td>
                <td class="text-start">
                    <p class="d-inline-block"> {{ $cartproduct->discount }} %</p>
                </td>
                <td>
                    <div class="value-button" id="decrease" onclick="decreaseValue(0, 50.00, 5.00)" value="Decrease Value">-</div>
                    <input type="number" id="quantity" class="quantity-0" name="quantity" value="{{ $cartproduct->qty }}">
                    <div class="value-button" id="increase" onclick="increaseValue(0, 50.00, 5.00)" value="Increase Value">+</div>
                </td>
                <td class="text-start">
                    SAR {{ $cartproduct->subtotal }}
                </td>
                <td class="text-center">
                    <a class="cancel-btn" href="{{ route('cart.destry', $cartproduct->rowId) }}">
                        <i class="far fa-window-close fs-5"></i>
                    </a>
                </td>
            </tr>
            {{-- <script type="text/javascript">
                function incrementValue()
                {
                    var value = parseInt(document.getElementById('quantity').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value<100){
                        value++;
                        document.getElementById('quantity').value = value;
                    }
                }
                function decrementValue()
                {
                    var value = parseInt(document.getElementById('number1').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value>1){
                        value--;
                        document.getElementById('quantity').value = value;
                    }
                }
            </script> --}}
        @endforeach
    </tbody>
</table>