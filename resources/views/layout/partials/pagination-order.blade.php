@if ($paginator->hasPages())
  <nav>
      <ul class="pagination pagination-order">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
              <li class="disabled pagination-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                  <span class="pagination-item-link" aria-hidden="true"><i class="pagination-item-icon fa-solid fa-angle-left"></i></span>
              </li>
          @else
              <li class="pagination-item">
                  <a class="pagination-item-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="pagination-item-icon fa-solid fa-angle-left"></i></a>
              </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li class="disabled pagination-item" aria-disabled="true"><span class="pagination-item-link">{{ $element }}</span></li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $paginator->currentPage())
                          <li class="pagination-item-active pagination-item" aria-current="page"><span class="pagination-item-link">{{ $page }}</span></li>
                      @else
                          <li class="pagination-item"><a class="pagination-item-link" href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                  @endforeach
              @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
              <li class="pagination-item">
                  <a class="pagination-item-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="pagination-item-icon fa-solid fa-angle-right"></i></a>
              </li>
          @else
              <li class="disabled pagination-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                  <span class="pagination-item-link" aria-hidden="true"><i class="pagination-item-icon fa-solid fa-angle-right"></i></span>
              </li>
          @endif
      </ul>
  </nav>
@endif

@push('scripts')

@endpush

