
<div class="tab-content" id="myTabContent">
     <div class="container">
          <div class="row">
               <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                         <div class="icon">
                              <i class="fa fa-shopping-bag"></i>
                         </div>
                         <div class="text">
                              <h5>Filter by Category</h5>
                              <select wire:model="byCategory" class="form-control" >
                                   <option value=""></option>
                                   @foreach ($categories as $category)
                                   <option value="{{ $category->id }}">
                                   {{ $category->category_name }}
                                   </option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
               </div>
          </div>
     </div> 
     <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
          <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
               data-slick-setting='{
          "autoplay": true,
          "autoplaySpeed": 8000,
          "slidesToShow": 5,
          "rows":2,
          "dots":true
     }' data-slick-responsive='[
          {"breakpoint":1200, "settings": {"slidesToShow": 3} },
          {"breakpoint":768, "settings": {"slidesToShow": 2} },
          {"breakpoint":480, "settings": {"slidesToShow": 1} },
          {"breakpoint":320, "settings": {"slidesToShow": 1} }
     ]'>

               @foreach($products as $product)
               <div class="single-slide">
               <div class="product-card">
                    <div class="product-header">
                         <h3><a href="{{ route('product.show', $product->product->id) }}">{{ $product->product->product_name }}</a></h3>
                    </div>
                    <div class="product-card--body">
                         <div class="card-image">
                              <img src="{{ asset('assets/image/products/product-1.jpg') }}" alt="">
                              <div class="hover-contents">
                                   <a href="{{ route('product.show', $product->product->id) }}" class="hover-image">
                                   <img src="{{ asset('assets/image/products/product-1.jpg') }}" alt="">
                                   </a>
                                   {{-- <div class="hover-btns">
                                        <button wire:click="addToCart({{ $product->id }}) class="single-btn">
                                        <i class="fas fa-shopping-basket"></i>
                                        </button>
                                   </div> --}}
                              </div>
                         </div>
                         <div class="price-block">
                              <span class="price">Rp.{{ number_format($product->product->price, 2, ',', '.') }}</span>
                              {{-- <del class="price-old">£51.20</del>
                              <span class="price-discount">20%</span> --}}
                         </div>
                    </div>
               </div>
               </div>
               @endforeach
          </div>
     </div>
</div>

{{$products->links()}}