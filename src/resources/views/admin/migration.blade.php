@extends('layouts.admin')

@section('content')
<div id="tag-list" x-data="{ showModal: false }">
    @if (session('error'))
    <div class="flex items-center bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2">
        <div class="text-red-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg>
        </div>
        <div class="text-white max-w-xs ">
            {{ session('error') }}
        </div>
    </div>
    @elseif(session('success'))
    <div class="flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
        <div class="text-green-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg>
        </div>
        <div class="text-white max-w-xs ">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="flex-col py-5">
        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Migrations
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">ID</th>
                            <th class="text-left p-3 px-5">Title</th>
                            <th class="text-left p-3 px-5">Migrated At</th>
                            <th></th>
                        </tr>
                        {{-- @foreach ($tags as $tag)
                        <tr class="border-b hover:bg-gray-200 bg-gray-100">
                            <td class="p-2 px-5">{{ $tag->id }}</td>
                        <td class="p-2 px-5">{{ $tag->title }}</td>
                        <td class="p-2 px-5">{{ $tag->color_code }}
                            <span style="color: {{ $tag->color_code }}">
                                <ion-icon name="square"></ion-icon>
                            </span>
                        </td>
                        <td class="p-2 px-5 flex justify-end">
                            <button type="button"
                                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                @click="setEditModal('{{ $tag->id }}', '{{ $tag->title }}', '{{ $tag->color_code }}'); showEditkModal = true">Edit</button>
                            <button type="button"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 ml-3 rounded focus:outline-none focus:shadow-outline"
                                @click="setDeleteModal({!! $tag->id !!}); showDeleteModal = true">Delete</button>
                        </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>
    console.log('check');
    // function setEditModal(id, title, colorCode) {
    //     document.getElementById("edit_tag_id").value = id;
    //     document.getElementById("edit_tag_title").value = title;
    //     document.getElementById("edit_tag_color_code").value = colorCode;
    // }
    // function setDeleteModal(id) {
    //     document.getElementById("delete_tag_id").value = id;
    // }
</script>
@endpush