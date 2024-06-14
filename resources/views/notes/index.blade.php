/<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold mb-8">Notes</h1>
                        @can('note-create')
                        <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded max-h-[40px]">Create Note</a>
                        @endcan
                    </div>
                    @foreach ($notes as $note)
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <!-- Role:admin -->
                        @role('Admin')
                        <h2 class="text-l font-bold mb-2">
                            Owner:
                            @if ($note->user_id === auth()->id())
                            You
                            @else
                            {{ $note->user->name }}
                            @endif
                        </h2>
                        @endrole
                        <h2 class="text-xl font-bold">{{ $note->title }}</h2>
                        <p class="mt-2">{{ $note->content }}</p>
                        <div class="mt-4 flex justify-between">
                            @can('note-update')
                            <a href="{{ route('notes.edit', $note) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded h-[40px]">Edit</a>
                            @endcan

                            @can('note-delete')
                            <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>