@extends('layouts.admin')

@section('content')
<div id="tag-list" x-data="{ showBlockModal: false, showActivateModal: false }">
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
                    Tag List
                </h1>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">ID</th>
                            <th class="text-left p-3 px-5">Title</th>
                            <th class="text-left p-3 px-5">Color Code</th>
                            <th></th>
                        </tr>
                        @foreach ($tags as $tag)
                        <tr class="border-b hover:bg-gray-200 bg-gray-100">
                            <td class="p-2 px-5">{{ $tag->id }}</td>
                            <td class="p-2 px-5">{{ $tag->title }}</td>
                            <td class="p-2 px-5">{{ $tag->color_code }}</td>
                            <td class="p-2 px-5 flex justify-end">
                                {{-- @if ($user->status === \App\Enums\UserStatus::ACTIVATED)
                                <button type="button"
                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                    @click="setUserId({!! $user->id !!}); showBlockModal = true">Block</button>
                                @else
                                <button type="button"
                                    class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                    @click="setUserId({!! $user->id !!}); showActivateModal = true">Activate</button>
                                @endif --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Block Modals -->
    {{-- <div x-show="showBlockModal"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
        style="background: rgba(0, 0, 0, 0.7)">
        <div
            class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Alerts</p>
                    <div class="cursor-pointer z-50" @click="showBlockModal = false">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
                <!--Body-->
                <form action="{{ route('admin.user.block') }}" method="POST" ref="block_form">
    @csrf
    <input type="hidden" name="user_id" id="block_user_id" value="">
    <div class="my-5">
        <p>
            are you really want to block this user?
        </p>
    </div>
    <!--Footer-->
    <div class="flex justify-end pt-2">
        <button class="focus:outline-none modal-close px-4 bg-ash-gray p-3 rounded-lg text-black hover:bg-gray-300"
            type="button" @click="showBlockModal = false">
            Cancel
        </button>
        <button class="focus:outline-none px-4 bg-hot-orange p-3 ml-3 rounded-lg text-white hover:bg-hot-orange-darker"
            type="submit">
            Confirm
        </button>
    </div>
    </form>
</div>
</div>
</div> --}}

<!-- Activate Modals -->
{{-- <div x-show="showActivateModal"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
        style="background: rgba(0, 0, 0, 0.7)">
        <div
            class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Alerts</p>
                    <div class="cursor-pointer z-50" @click="showActivateModal = false">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
                <!--Body-->
                <form action="{{ route('admin.user.activate') }}" method="POST" ref="activate_form">
@csrf
<input type="hidden" name="user_id" id="activate_user_id" value="">
<div class="my-5">
    <p>
        are you really want to activate this user?
    </p>
</div>
<!--Footer-->
<div class="flex justify-end pt-2">
    <button class="focus:outline-none modal-close px-4 bg-ash-gray p-3 rounded-lg text-black hover:bg-gray-300"
        type="button" @click="showActivateModal = false">
        Cancel
    </button>
    <button class="focus:outline-none px-4 bg-hot-orange p-3 ml-3 rounded-lg text-white hover:bg-hot-orange-darker"
        type="submit">
        Confirm
    </button>
</div>
</form>
</div>
</div>
</div> --}}
</div>

@stop

@push('scripts')
<script>
    function setUserId(id) {
        document.getElementById("block_user_id").value = id;
        document.getElementById("activate_user_id").value = id;
    }
</script>
@endpush