<x-weblayout>
      <section class="faq-section">
         <div class="container">
            @if (!empty($faqs))
                @foreach ($faqs as $single)
            <div class="faq-content">
               <h3>{{ $single->question }}</h3>
               <p>{{ $single->answer }}</p>
            </div>
                @endforeach
            @endif
         </div>
      </section>
</x-weblayout>