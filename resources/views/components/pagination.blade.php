@props(['testimonials'])
<style>
    .pagination-month .page-item .page-link{
        font-size: 1rem !important;
    }
</style>
                     @if ($testimonials->lastPage()>1)
                        <ul class="pagination pagination-sm pagination-month justify-content-center">
                            @php
                                $next=$testimonials->currentPage()+1;
                                $prev=$testimonials->currentPage()-1;
                            @endphp
                            @if ($testimonials->currentPage()>1)
                            <li class="page-item">
                                <a href="{{ route('testimonials.index') }}?page={{ $prev }}" class="page-link">Previous</a>
                            </li>
                            @endif
                            @for ($i=1;$i<=$testimonials->lastPage();$i++)
                                @if ($i<=3 || $i>$testimonials->lastPage()-3 || ($i>$testimonials->currentPage()-3 && $i<$testimonials->currentPage()+3))
                                    <li class="page-item {{ $testimonials->currentPage()==$i?'active':'' }}">
                                        <a href="{{ route('testimonials.index') }}?page={{ $i }}" class="page-link">{{ $i }}</a>
                                    </li>
                                @elseif ($i==3+1 || $i==$testimonials->lastPage()-3)
                                    <li class="page-item">
                                        <a href="#" class="page-link">...</a>
                                    </li>
                                @endif
                            @endfor
                            @if ($testimonials->currentPage()!=$testimonials->lastPage())
                            <li class="page-item">
                                <a href="{{ route('testimonials.index') }}?page={{ $next }}" class="page-link">Next</a>
                            </li>
                            @endif
                        </ul>
                         
                     @endif