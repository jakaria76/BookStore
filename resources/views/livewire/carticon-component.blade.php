<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="cart.html" aria-label="View cart">
            <img alt="Surfside Media" src="{{ asset('/') }}assets/imgs/theme/icons/icon-cart.svg">

            @if(Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{ Cart::instance('cart')->count() }}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            @if(Cart::instance('cart')->count() > 0)
            <ul>
                @foreach(Cart::instance('cart')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="product-details.html">
                            <img alt="Surfside Media" src="{{ asset($item->model->image) }}">
                        </a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4>
                            <a href="product-details.html">{{ ucwords($item->model->name) }}</a>
                        </h4>
                        <h4><span>{{ $item->qty }} × </span>&#2547; {{ number_format((float) $item->model->sale_price, 2) }}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent="remove('{{ $item->rowId }}')">
                            <i class="fi-rs-cross-small"></i>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>&#2547; {{ number_format((float) Cart::instance('cart')->subtotal(), 2) }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="cart.html" class="outline">View cart</a>
                    <a href="checkout.html">Checkout</a>
                </div>
            </div>
            @else
            <p class="empty-cart-message">Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
