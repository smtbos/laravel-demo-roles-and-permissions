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
                        <h1 class="text-3xl font-bold mb-8">Create Note</h1>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <form action="{{ route('notes.store') }}" method="POST">
                            @csrf
                            @include('notes.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>