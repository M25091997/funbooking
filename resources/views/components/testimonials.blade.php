@props(['testimonials'])

      <section class="testimonial-section">
         <div class="headline">
            <h2>
            What Our Users Are Saying
            </h2>
         </div>
         <div class="short-dis">
        <p> Explore the authentic voices of user satisfaction in our testimonial section. Echoing diverse and exceptional experiences with our products.</p>
         </div>
         <div class="container-fluid">
            <div class="owl-carousel owl-theme slider-carousel" id="testimonial-right">
                @php
                    $i=0;
                @endphp
                @foreach ($testimonials as $key=>$single)
               <div class="item">
                  <div class="testimonial-card">
                     <ul>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                     </ul>
                     <p>“{{ $single->content }}"</p>
                     <h5>{{ $single->name }}</h5>
                     <p>{{ $single->location }}</p>
                  </div>
               </div>
                @php
                    $i++;
                    unset($testimonials[$key]);
                @endphp
                @if ($i==15)
                @break
                @endif
                @endforeach
            </div>
            <div class="owl-carousel owl-theme slideltr" id="testimonial-left">
                @foreach ($testimonials as $single)
               <div class="item">
                  <div class="testimonial-card">
                     <ul>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                        <li>
                           <i class="fa-solid fa-star"></i>
                        </li>
                     </ul>
                     <p>“{{ $single->content }}"</p>
                     <h5>{{ $single->name }}</h5>
                     <p>{{ $single->location }}</p>
                  </div>
               </div>
                    
                @endforeach
            </div>
         </div>
      </section>