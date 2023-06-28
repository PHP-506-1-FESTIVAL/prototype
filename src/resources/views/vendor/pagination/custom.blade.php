<!DOCTYPE html>
<html>

@if ($paginator->hasPages())
<div class="pagination center">
	<ul class="pagination-list">
		@if ($paginator->onFirstPage())
		@else
		<li><a href="{{ $paginator->previousPageUrl() }}">
			<i class="lni lni-chevron-left"></i></a>
		</li>
		@endif

		@foreach ($elements as $element)
		@if (is_string($element))
		<li>{{ $element }}</li>
		@endif

		@if (is_array($element))
		@foreach ($element as $page => $url)
		@if ($page == $paginator->currentPage())
		<li class=" active">
			<a>{{ $page }}</a>
		</li>
		@else
		<li>
			<a href="{{ $url }}">{{ $page }}</a>
		</li>
		@endif
		@endforeach
		@endif
		@endforeach

		@if ($paginator->hasMorePages())
		<li>
			<a href="{{ $paginator->nextPageUrl() }}"
			rel="next"><i class="lni lni-chevron-right"></i></a>
		</li>
		@else
		@endif
	</ul>
</div>
	@endif

{{-- @if ($paginator->hasPages())
<nav aria-label="Page navigation example">
<div class="pagination left">
	<ul class="pagination justify-content-center pagination-list">
		@if ($paginator->onFirstPage())
		<li class="page-item disabled">
			<a class="page-link" href="#"
			tabindex="-1"><i class="lni lni-chevron-left"></i></a>
		</li>
		@else
		<li class="page-item"><a class="page-link"
			href="{{ $paginator->previousPageUrl() }}">
			<i class="lni lni-chevron-left"></i></a>
		</li>
		@endif

		@foreach ($elements as $element)
		@if (is_string($element))
		<li class="page-item disabled">{{ $element }}</li>
		@endif

		@if (is_array($element))
		@foreach ($element as $page => $url)
		@if ($page == $paginator->currentPage())
		<li class="page-item active">
			<a class="page-link">{{ $page }}</a>
		</li>
		@else
		<li class="page-item">
			<a class="page-link"
			href="{{ $url }}">{{ $page }}</a>
		</li>
		@endif
		@endforeach
		@endif
		@endforeach

		@if ($paginator->hasMorePages())
		<li class="page-item">
			<a class="page-link"
			href="{{ $paginator->nextPageUrl() }}"
			rel="next"><i class="lni lni-chevron-right"></i></a>
		</li>
		@else
		<li class="page-item disabled">
			<a class="page-link" href="#"><i class="lni lni-chevron-right"></i></a>
		</li>
		@endif
	</ul>
</div>
</nav>
	@endif --}}

</html>
