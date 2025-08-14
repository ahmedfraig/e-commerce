<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('userWeb/assets')}}/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="{{asset('userWeb/assets')}}/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('userWeb/assets')}}/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('userWeb/assets')}}/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
        <div class="hero_area">
                <!-- header section strats -->
                @include('frontend.header')
                <!-- end header section -->
            <section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Your <span>Cart</span>
            </h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @php
            $totalPrice = 0;
            $totalQuantity = 0;
        @endphp

        <div class="row">
            @foreach ($carts as $cart)
                @php
                    $itemTotal = $cart->product->price * $cart->quantity;
                    $totalPrice += $itemTotal;
                    $totalQuantity += $cart->quantity;
                @endphp

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="#" class="option2">
                                    {{ $cart->product->name }}
                                </a>

                                <div style="display:flex; gap:5px; align-items:center; margin-top:5px;">
                                    {{-- Remove From Cart --}}
                                    <form id="remove-from-cart-{{ $cart->id }}" action="{{ route('cart.destroy', $cart->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="javascript:void(0)" class="option1"
                                        onclick="document.getElementById('remove-from-cart-{{ $cart->id }}').submit();">
                                        Remove From Cart
                                    </a>

                                    {{-- Show Quantity --}}
                                    <span style="margin-left:5px;">Qty: {{ $cart->quantity }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Product Image --}}
                        <div class="img-box">
                            <img src="{{ asset('uploads/'.$cart->product->image) }}" alt="">
                        </div>

                        {{-- Product Details --}}
                        <div class="detail-box">
                            <h5>{{ $cart->product->name }}</h5>
                            <h6>Price: ${{ $cart->product->price }}</h6>
                            
                        </div>
                        <p style="text-align: center">Item Total Price: ${{ $itemTotal }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Cart Summary --}}
        <div class="cart-summary mt-4" style="text-align:right;">
            <h5>Total Items: {{ $totalQuantity }}</h5>
            <h5>Total Price: ${{ $totalPrice }}</h5>
        </div>
    </div>
</section>

        </div>


      <!-- footer start -->
      @include('frontend.footer')
      <!-- footer end -->
      @include('frontend.cpy')
      <!-- jQery -->
      <script src="{{asset('userWeb/assets')}}/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="{{asset('userWeb/assets')}}/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="{{asset('userWeb/assets')}}/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="{{asset('userWeb/assets')}}/js/custom.js"></script>
   
    </body>
</html>
