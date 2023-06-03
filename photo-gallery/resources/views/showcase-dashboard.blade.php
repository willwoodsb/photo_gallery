<x-base-layout title="Showcase Dashboard | Admin">
    <x-admin.layout title="Showcase Dashboard">
        <table class="w-full text-sm">
            <tr class="border">
                <th>
                    Title
                </th>
                <th>
                    
                </th>
                <th>
                    
                </th>
            </tr>
            @foreach($showcases as $showcase)
            <tr class="border">
                <td>{{$showcase->title}}</td>
                <td>
                    <a href="/admin/showcase/edit/{{ $showcase->slug}}" class="uppercase font-semibold hover:underline">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="/admin/showcase/delete/{{ $showcase->slug }}" method="POST" class="delete delete-post">
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
    
</x-base-layout> 