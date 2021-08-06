<div id="control-bar" x-data="{ showEditModal: false, showDestroyModal: false }">
    <div class="note-control-bar">
        <div class="control-menus">
            <div class="search-box">
                <note-search-box-component index-url="{{ route('notes.index') }}" />
            </div>
            <nav class="control-panels">
                @switch(Route::current()->getName())

                @case('notes.index')
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200 cursor-pointer"
                    href="{{ route('notes.create') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="pencil"></ion-icon>
                            <span class="ml-1 hidden lg:inline">New</span>
                        </div>
                    </div>
                </a>
                @break

                @case('notes.create')
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ url()->previous() }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="arrow-back-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">Back</span>
                        </div>
                    </div>
                </a>
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ route('notes.index') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="book-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">List</span>
                        </div>
                    </div>
                </a>
                @break

                @case('notes.edit')
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ url()->previous() }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="arrow-back-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">Back</span>
                        </div>
                    </div>
                </a>
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ route('notes.index') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="book-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">List</span>
                        </div>
                    </div>
                </a>
                @break

                @case('notes.show')
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ route('notes.index') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="arrow-back-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">Back</span>
                        </div>
                    </div>
                </a>
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200 cursor-pointer"
                    href="{{ route('notes.create') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="pencil"></ion-icon>
                            <span class="ml-1 hidden lg:inline">New</span>
                        </div>
                    </div>
                </a>
                <form action="{{ route('notes.edit', $note->id) }}" method="get" ref="form" class="mb-0" id="edit-form">
                    @csrf
                    <button type="submit" @click="showEditModal = true"
                        class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200 focus:outline-none">
                        <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                            <div class="flex justify-between items-center">
                                <ion-icon name="create-outline"></ion-icon>
                                <span class="ml-1 hidden lg:inline">Edit</span>
                            </div>
                        </div>
                    </button>
                </form>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" ref="form" class="mb-0"
                    id="destroy-form">
                    <input name="_method" type="hidden" value="DELETE" />
                    @csrf
                    <button type="button" @click="showDestroyModal = true"
                        class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200 focus:outline-none">
                        <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                            <div class="flex justify-between items-center">
                                <ion-icon name="trash-outline"></ion-icon>
                                <span class="ml-1 hidden lg:inline">Delete</span>
                            </div>
                        </div>
                    </button>
                </form>
                @break

                @default
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200"
                    href="{{ route('notes.index') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="book-outline"></ion-icon>
                            <span class="ml-1 hidden lg:inline">List</span>
                        </div>
                    </div>
                </a>
                <a class="flex items-start rounded-lg bg-transparent p-2 hover:text-gray-900 hover:bg-gray-200 cursor-pointer"
                    href="{{ route('notes.create') }}">
                    <div class="bg-laravel-red hover:bg-laravel-red-lighter text-white rounded-lg p-3 lg:py-2">
                        <div class="flex justify-between items-center">
                            <ion-icon name="pencil"></ion-icon>
                            <span class="ml-1 hidden lg:inline">New</span>
                        </div>
                    </div>
                </a>

                @endswitch
            </nav>
        </div>
    </div>

    <div x-show="showEditModal"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
        style="background: rgba(0, 0, 0, 0.7)">
        <div
            class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Caution</p>
                    <div class="cursor-pointer z-50" @click="showEditModal = false">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">
                    <p>
                        do you want to edit this note?
                    </p>
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="focus:outline-none modal-close px-4 bg-ash-gray p-3 rounded-lg text-black hover:bg-gray-300"
                        @click="showEditModal = false">
                        Cancel
                    </button>
                    <button
                        class="focus:outline-none px-4 bg-laravel-red p-3 ml-3 rounded-lg text-white hover:bg-laravel-red-lighter"
                        @click="submitEditForm()">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div x-show="showDestroyModal"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
        style="background: rgba(0, 0, 0, 0.7)">
        <div
            class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Alerts</p>
                    <div class="cursor-pointer z-50" @click="showDestroyModal = false">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">
                    <p>
                        do you want to delete this note?
                    </p>
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button
                        class="focus:outline-none modal-close px-4 bg-ash-gray p-3 rounded-lg text-black hover:bg-gray-300"
                        @click="showDestroyModal = false">
                        Cancel
                    </button>
                    <button
                        class="focus:outline-none px-4 bg-laravel-red p-3 ml-3 rounded-lg text-white hover:bg-laravel-red-lighter"
                        @click="submitDestroyForm()">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitEditForm() {
        document.getElementById("edit-form").submit();
    }
    function submitDestroyForm() {
        document.getElementById("destroy-form").submit();
    }
</script>