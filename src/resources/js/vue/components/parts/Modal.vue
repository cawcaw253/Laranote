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
            class="focus:outline-none px-4 bg-laravel-red p-3 ml-3 rounded-lg text-white hover:bg-laravel-red-lighter"
            @click="submit()"
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
    <!-- spinner -->
    <div
      class="loading fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
      :class="[isLoading ? 'fadeIn' : 'fadeOut', { closed: !isLoading }]"
      style="background: rgba(0, 0, 0, 0.2)"
    >
      <!-- pure css loaders -->
      <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
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
    isActive: {
      type: Boolean,
      required: true,
    },
  },
  data() {
    return {
      isClosed: true,
      isLoading: false,
    };
  },
  watch: {
    isActive: function (val) {
      if (val) {
        this.isClosed = false;
      } else {
        this.isClosed = true;
        this.isLoading = false;
      }
    },
  },
  methods: {
    closeModal() {
      if (this.isLoading) {
        return;
      }
      this.$emit("closeEvent");
      setTimeout(() => {
        this.isClosed = true;
      }, 500);
    },
    submit() {
      if (this.isLoading) {
        return;
      }
      this.isLoading = true;
      this.$emit("submitEvent");
    },
  },
};
</script>

<style lang="scss" scoped>
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
