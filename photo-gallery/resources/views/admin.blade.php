<x-base-layout title="Dashboard | Admin">
    <x-admin.layout title="Dashboard">
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
                    Title
                </th>
                <th>
                    Sub Category
                </th>
                <th>
                    
                </th>
                <th>
                    
                </th>
            </tr>
            @foreach($posts as $post)
            <tr class="border">
                <td>{{$post->title}}</td>
                <td>
                    @foreach ($subCategories as $subCat)
                        @if ($subCat->id == $post->sub_category_id)
                            {{$subCat->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="admin/photos/edit/{{ $post->slug}}" class="uppercase font-semibold hover:underline">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/admin/photos/delete/{{ $post->slug }}" method="POST" class="delete delete-post">
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
        {{$posts->links()}}
    </div>
    
</x-base-layout> 