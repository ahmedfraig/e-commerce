<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>

      @if(session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
      @endif

   <select name="category_id" class="form-control form-control-lg" required
         onchange="if(this.value) window.location.href=this.value">
   <option value="{{ route('home.index') }}" {{ request()->routeIs('home.index') ? 'selected' : '' }}>
      All Categories
   </option>
   @foreach($categories as $category)
      <option value="{{ route('home.byCategory', $category->id) }}" 
         {{ request()->routeIs('home.byCategory') && request()->id == $category->id ? 'selected' : '' }}>
         {{ $category->name }}
      </option>
   @endforeach
   </select>


      <div class="row">
         @foreach ($showProducts as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">
                  <div class="option_container">
                     <div class="options">

                        {{-- Product name link --}}
                        <a href="#" class="option1">
                           {{ $product->name }}
                        </a>

                        {{-- Quantity input & Add to Cart (styled as <a>) --}}
                        <div style="display:flex; gap:5px; align-items:center; margin-top:5px;">

                           {{-- Hidden form for submission --}}
                           <form id="add-to-cart-{{ $product->id }}" action="{{ route('cart.store') }}" method="POST" style="display:none;">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                              <input type="hidden" name="quantity" id="quantity-{{ $product->id }}" value="1">
                           </form>

                           {{-- Clickable <a> to submit form --}}
                           <a href="javascript:void(0)" class="option2"
                              onclick="document.getElementById('add-to-cart-{{ $product->id }}').submit();">
                              Add to Cart
                           </a>
                           <input type="number" value="1" min="1"
                              onchange="document.getElementById('quantity-{{ $product->id }}').value = this.value"
                              style="width:65px; padding:6px; border:1px solid #ccc; border-radius:6px; text-align:center;">
                        </div>

                     </div>
                  </div>

                  {{-- Product Image --}}
                  <div class="img-box">
                     <img src="{{ asset('uploads/'.$product->image) }}" alt="">
                  </div>

                  {{-- Product Details --}}
                  <div class="detail-box">
                     <h5>{{ $product->name }}</h5>
                     <h6>${{ $product->price }}</h6>
                  </div>
               </div>
            </div>  
         @endforeach
      </div>

      <div class="btn-box">
         <a href="">
            View All products
         </a>
      </div>

      <div class="pagination">
         {{ $showProducts->links('pagination::bootstrap-5') }}
      </div>
   </div>
</section>
