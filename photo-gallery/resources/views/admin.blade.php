<x-base-layout title="Dashboard | Admin">
    <x-admin.layout title="Dashboard">
        <table class="w-full text-sm">
            <tr class="border">
                <th>
                    Title
                </th>
                <th>
                    SubCategory
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
                    <a href="admin/photos/edit/{{ $post->title}}" class="uppercase font-semibold hover:underline">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/photos/delete/{{ $post->title}}" method="POST">
                        @csrf
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