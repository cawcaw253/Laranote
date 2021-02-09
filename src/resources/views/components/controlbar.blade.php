<div id="controlbar" class="bg-white rounded w-full mt-4 p-2">
    <note-controlbar-component csrf="{{ json_encode(csrf_token()) }}" index-url="{{ route('notes.index') }}"
        edit-url="{{ route('notes.edit', $noteId) }}" destroy-url="{{ route('notes.destroy', $noteId) }}" />
</div>