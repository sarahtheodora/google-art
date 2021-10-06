<div>
    <h1 class="text-center text-2xl mt-3">Collection</h1>
	{{-- <Table 1> --}}
	<div class="px-2">
        @if ($categoryId != 0)
        <input wire:model="collectionName" class="w-full rounded-t-lg" placeholder="Name" type="text">
        <input wire:model="collectionThumbnail" class="w-full" placeholder="Thumbnail" type="text">
        <textarea wire:model="collectionDetail" class="w-full" placeholder="Details"></textarea>
        <button wire:click="simpan()" class="w-full rounded-b-lg px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white">Add to {{ $categoryName->name }}</button>
        @endif
    </div>
</div>
