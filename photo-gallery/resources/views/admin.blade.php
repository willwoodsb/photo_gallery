<x-base-layout>
    <form action="/admin/logout" method="post">
        @csrf
        <x-form.button>Logout</x-button>
    </form>
</x-base-layout>