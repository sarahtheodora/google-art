<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exhibit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap">
                    <div class="w-full xl:w-1/3 px-1">
                        @livewire('admin.exhibit.country')
                    </div>
                    <div class="w-full xl:w-1/3 px-1">
                        @livewire('admin.exhibit.partner')
                    </div>
                    <div class="w-full xl:w-1/3 px-1">
                        @livewire('admin.exhibit.exhibit')
                    </div>
                    <div class="w-full px-1">
                        @livewire('admin.exhibit.trash')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
