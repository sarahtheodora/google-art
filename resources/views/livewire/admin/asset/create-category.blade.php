<div>
    <h1 class="text-center text-2xl mt-3">Category</h1>
	{{-- <Table 1> --}}
	<div class="px-2">
        @if ($partnerId != 0)
        <input wire:model="categoryName" class="w-full rounded-t-lg" placeholder="Category Name" type="text">
        <input wire:model="categoryThumbnail" class="w-full" placeholder="Category Thumbnail" type="text">
        <button wire:click="simpan()" class="w-full rounded-b-lg px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white">Add to {{ $partnerName->name }}</button>
        @endif
    </div>
</div>
