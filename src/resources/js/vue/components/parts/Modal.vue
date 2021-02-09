<template>
  <div
    class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
    :class="[isActive ? 'fadeIn' : 'fadeOut', { closed: isClosed }]"
    style="background: rgba(0, 0, 0, 0.7)"
  >
    <div
      class="border shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto"
    >
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">{{ header }}</p>
          <div class="cursor-pointer z-50" @click="closeModal()">
            <svg
              class="fill-current text-black"
              xmlns="http://www.w3.org/2000/svg"
              width="18"
              height="18"
              viewBox="0 0 18 18"
            >
              <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
              ></path>
            </svg>
          </div>
        </div>
        <!--Body-->
        <div class="my-5">
          <p>
            {{ body }}
          </p>
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button
            class="focus:outline-none modal-close px-4 bg-ash-gray p-3 rounded-lg text-black hover:bg-gray-300"
            @click="closeModal()"
          >
            Cancel
          </button>
          <button
            class="focus:outline-none px-4 bg-hot-orange p-3 ml-3 rounded-lg text-white hover:bg-red-600"
            @click="submit()"
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    header: {
      type: String,
      required: true,
    },
    body: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      isActive: false,
      isClosed: true,
    };
  },
  methods: {
    openModal() {
      this.isActive = true;
      this.isClosed = false;
    },
    closeModal() {
      this.isActive = false;
      setTimeout(() => {
        this.isClosed = true;
      }, 500);
    },
    submit() {
      this.$emit("action");
    },
  },
};
</script>
