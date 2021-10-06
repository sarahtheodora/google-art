<div>
    <h1 class="text-center text-2xl mt-3">Country</h1>
	{{-- <Table 1> --}}
	<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
		<div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
			<div class="flex justify-between">
				<div class="inline-flex border rounded w-full px-2 lg:px-6 h-12 bg-transparent">
					<div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
						<div class="flex">
							<span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
								<svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
						</div>
						<input wire:model="searchCountry" type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
					</div>
				</div>
			</div>
		</div>
		<div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
			<table class="min-w-full">
				<thead>
					<tr>
						<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
						<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Emoji</th>
						<th class="px-6 py-3 border-b-2 border-gray-300"></th>
						<th class="px-6 py-3 border-b-2 border-gray-300"></th>
					</tr>
				</thead>
				<tbody class="bg-white">
					@foreach ($countries as $country)
					<tr>
						<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $country->name }}</td>
						<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $country->emoji }}</td>
						<td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
							<button wire:click="tambah('{{ $country->id }}')" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg>
							</button>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
							<button wire:click="pilih('{{ $country->id }}')" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                  </svg>
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="my-3">{{ $countries -> links() }}</div>
		</div>
	</div>
    {{-- </Table 1> --}}
    <!-- component -->
	@if ($countryId != 0)
	<div class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">
		<!-- modal -->
		<div class="bg-white rounded shadow-lg w-1/3">
			<!-- modal header -->
			<div class="border-b px-4 py-2 flex justify-between items-center">
				<h3 class="font-semibold text-lg">{{ $countryName }}</h3>
				<button wire:click="closeModals()" class="text-black">&cross;</button>
			</div>
			<!-- modal body -->
			<div class="p-3">
				<div class="flex justify-center mb-3">
					<img class="rounded-lg" src="///" alt="">
				</div>
				<input wire:model="partnerName" placeholder="Partner Name" class="w-full px-2 py-1 rounded-lg text-gray-600 mb-3" type="text">
				<input wire:model="partnerThumbnail" placeholder="Partner Thumbnail" class="w-full px-2 py-1 rounded-lg text-gray-600 mb-3" type="text">
                <input wire:model="partnerLogo" placeholder="Partner Logo" class="w-full px-2 py-1 rounded-lg text-gray-600 mb-3" type="text">
                <select wire:model="partnerCityId" class="w-full px-2 py-1 rounded-lg text-gray-600 mb-3">
                    <option value="0">City</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <textarea wire:model="partnerDescription" placeholder="description" class="w-full px-2 py-1 rounded-lg text-gray-600 mb-3"></textarea>
			</div>
			<div class="flex justify-end items-center w-100 border-t p-3">
				<button wire:click="closeModals()" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">Cancel</button>
				<button wire:click="simpan({{ $countryId }})" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Simpan</button>
			</div>
		</div>
	</div>
	@endif
</div>