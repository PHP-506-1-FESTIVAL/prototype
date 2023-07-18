<!DOCTYPE html>
<html>
	@if ($paginator->hasPages())
		<div class="d-flex justify-content-center">
			<ul class="pagination">
				@if ($paginator->onFirstPage())
				@else
				<li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">
					«</a>
				</li>
				@endif

				@foreach ($elements as $element)
				@if (is_string($element))
				<li class="page-item">{{ $element }}</li>
				@endif

				@if (is_array($element))
				@foreach ($element as $page => $url)
				@if ($page == $paginator->currentPage())
				<li class="page-item active">
					<a class="page-link">{{ $page }}</a>
				</li>
				@else
				<li class="page-item">
					<a class="page-link" href="{{ $url }}">{{ $page }}</a>
				</li>
				@endif
				@endforeach
				@endif
				@endforeach

				@if ($paginator->hasMorePages())
				<li class="page-item">
					<a class="page-link" href="{{ $paginator->nextPageUrl() }}"
					rel="next">»</a>
				</li>
				@else
				@endif
			</ul>
		</div>
	@endif
</html>
