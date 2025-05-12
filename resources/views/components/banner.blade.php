
   @if ($bannerimages->total()>0)
      
      <section class="sliderCarousel">
         <div class="container-fluid">
            <div class="owl-carousel owl-theme owlSlider" id="sliderImage">
               @foreach ($bannerimages as $single)
               <div class="item">
                  <a href="{{ $single->link??'#' }}">
                     <div class="slider-img">
                        <img src="{{ asset('storage/'.$single->image) }}" alt="slider-image.webp" class="d-none d-md-block">
                        <img src="{{ asset('images/big-offers11.webp') }}" alt="slider-image.webp" class="d-block d-md-none">
                     </div>
                  </a>
               </div>
               @endforeach
            </div>
         </div>
      </section>
   @endif