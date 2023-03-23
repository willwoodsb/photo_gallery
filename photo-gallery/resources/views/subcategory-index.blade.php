<x-base-layout title="Sub Categories | Admin">
    <x-admin.layout title="Sub Categories">
    <form id="search" method="get" action="#" class="w-full flex flex-row justify-start"> 
            <input class="mb-1 px-3 py-2 text-sm rounded-l-lg h-10 border-r-0 mb-4"
                type="text"
                name="search"
                id="search"
                placeholder="Search..."
            >
            <button type="submit" class="bg-blue-500 text-white uppercase h-10 w-10 font-semibold text-xs py-2 px-2 rounded-r-lg hover:bg-blue-600">
                Go
            </button>
        </form>
        <table class="w-full text-sm">
            <tr class="border">
                <th>
                    Sub Category
                </th>
                <th>
                    Category
                </th>
                <th>
                    
                </th>
            </tr>
            @foreach($subCategories as $subCat)
            <tr class="border">
                <td>{{$subCat->name}}</td>
                <td>
                    @foreach ($categories as $cat)
                        @if ($cat->id == $subCat->category_id)
                            {{$cat->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="/admin/subcategories/edit/{{$subCat->slug}}" class="uppercase font-semibold hover:underline">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/admin/subcategories/delete/{{ $subCat->slug }}" method="POST" class="delete delete-subCat">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="uppercase font-semibold hover:underline">
                            Delete
                        </button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </table>
    </x-admin.layout>
    <div class="width mt-4">
        {{$subCategories->links()}}
    </div>
    
</x-base-layout>