@extends('layouts.admin')

@section('content')
<div id="user-list" x-data="{ showBlockModal: false }">

  @if (session('error'))
  <div class="flex justify-center mt-4">
    <div class="m-auto">
      <div class='alert'>
        <div class='w-10 border-r px-2'>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
            </path>
          </svg>
        </div>
        <div class='flex items-center px-2 py-3'>
          <div class='mx-3'>
            <p>{{ session('error') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @elseif(session('success'))
  <div class="flex justify-center mt-4">
    <div class="m-auto">
      <div class='alert'>
        <div class='w-10 border-r px-2'>
        </div>
        <div class='flex items-center px-2 py-3'>
          <div class='mx-3'>
            <p>{{ session('success') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="flex-col py-5">
    <div class="text-gray-900 bg-gray-200">
      <div class="p-4 flex">
        <h1 class="text-3xl">
          User List
        </h1>
      </div>
      <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
          <tbody>
            <tr class="border-b">
              <th class="text-left p-3 px-5">Name</th>
              <th class="text-left p-3 px-5">Email</th>
              <th class="text-left p-3 px-5">Status</th>
              <th></th>
            </tr>
            @foreach ($users as $user)
            <tr class="border-b hover:bg-gray-200 bg-gray-100">
              <td class="p-2 px-5">{{ $user->name }}</td>
              <td class="p-2 px-5">{{ $user->email }}</td>
              <td class="p-2 px-5">{{ \App\Enums\UserStatus::getDescription($user->status) }}
              </td>
              <td class="p-2 px-5 flex justify-end">
                @if ($user->status === \App\Enums\UserStatus::ACTIVE)
                <button type="button"
                  class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                  @click="setUserId({!! $user->id !!}); showBlockModal = true">Block</button>
                @else
                <button type="button"
                  class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Activate</button>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modals -->
  <div x-show="showBlockModal"
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
            <button
              class="focus:outline-none px-4 bg-hot-orange p-3 ml-3 rounded-lg text-white hover:bg-hot-orange-darker"
              type="submit">
              Confirm
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop

@push('scripts')
<script>
  function setUserId(id) {
    document.getElementById("block_user_id").value = id;
  }
</script>
@endpush