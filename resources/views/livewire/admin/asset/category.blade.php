<div>
    <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-300">
                    <td wire:click="pilihCategory('{{ $category->id }}')" class="cursor-pointer px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                        <span>{{ $category->name }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">{{ $categories -> links() }}</div>
    </div>
</div>
