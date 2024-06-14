<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('title', $note->title ?? '') }}">
    @error('title')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
    <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content', $note->content ?? '') }}</textarea>
    @error('content')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="flex justify-end">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Note</button>
</div>