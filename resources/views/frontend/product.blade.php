      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
                @foreach ($showProducts as $product)
                  <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           {{ $product->name }}
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{asset('uploads/'.$product->image)}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{ $product->name }}
                        </h5>
                        <h6>
                           ${{ $product->price }}
                        </h6>
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
            @foreach ($showProducts as $product )
                <span style="margin-left:20px;font-weight:bold;font-size:20px">{{ $product->name }}</span>
            @endforeach
            <div class="pagination">
                {{$showProducts->links('pagination::bootstrap-5');}}
        </div>
         </div>
      </section>