<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap">
                    <div class="w-full xl:w-1/2 px-1">
                        @livewire('admin.entity.entity')
                    </div>
                    <div class="w-full xl:w-1/2 px-1">
                        @livewire('admin.entity.entity-background')
                    </div>
                    <div class="w-full px-1">
                        @livewire('admin.entity.entity-trash')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
