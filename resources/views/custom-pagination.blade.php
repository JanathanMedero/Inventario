<div>
	@if ($paginator->hasPages())
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			@if ($paginator->onFirstPage())
			<li class="page-item disabled">
				<a class="page-link">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Anterior</span>
				</a>
			</li>
			@else
			<li class="page-item" wire:click="previousPage" wire:loading.attr="disabled">
				<a class="page-link" style="cursor: pointer;">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Previous</span>
				</a>
			</li>
			@endif

			@foreach($elements as $element)
			@if(is_array($element))
			@foreach ($element as $page => $url)
			@if($page == $paginator->currentPage())
			<li class="page-item active">
				<a class="page-link active" style="cursor:pointer;" wire:click="gotoPage({{$page}})">{{ $page }}</a>
			</li>
			@else
			<li class="page-item">
				<a class="page-link" style="cursor:pointer;" wire:click="gotoPage({{$page}})">{{ $page }}</a>
			</li>
			@endif
			@endforeach
			@endif
			@endforeach

			@if($paginator->hasMorePages())
			<li class="page-item" wire:click="nextPage" wire:loading.attr="disabled">
				<a class="page-link" style="cursor: pointer;">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				</a>
			</li>
			@else
			<li class="page-item disabled">
				<a class="page-link">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				</a>
			</li>
			@endif
		</ul>
	</nav>
	@endif
</div>