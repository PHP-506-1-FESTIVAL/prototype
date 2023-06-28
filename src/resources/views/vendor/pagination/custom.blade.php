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
</html>
