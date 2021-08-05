<template>
  <div>
    <div class="bg-white rounded w-full mt-4 p-2">
      <div class="grid grid-cols-1 gap-4">
        <a
          class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
          :href="indexUrl"
        >
          <div class="bg-vermilion-red text-white rounded-lg p-3">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-arrow-left"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"
              />
            </svg>
          </div>
        </a>

        <a
          class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline cursor-pointer"
          @click="openEditModal()"
        >
          <div class="bg-vermilion-red text-white rounded-lg p-3">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-pencil-square"
              viewBox="0 0 16 16"
            >
              <path
                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
              />
              <path
                fill-rule="evenodd"
                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
              />
            </svg>
          </div>
        </a>

        <form :action="destroyUrl" method="POST" ref="form">
          <input name="_method" type="hidden" value="DELETE" />
          <input name="_token" type="hidden" :value="csrf" />
          <button
            type="button"
            class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            @click="openDestroyModal()"
          >
            <div class="bg-vermilion-red text-white rounded-lg p-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-trash"
                viewBox="0 0 16 16"
              >
                <path
                  d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                />
                <path
                  fill-rule="evenodd"
                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                />
              </svg>
            </div>
          </button>
        </form>
      </div>
    </div>
    <note-modal-component
      ref="modal"
      @action="action()"
      :header="modalHeader"
      :body="modalBody"
    />
  </div>
</template>

<script>
import NoteModalComponent from "./parts/Modal";

export default {
  components: {
    NoteModalComponent,
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    indexUrl: {
      type: String,
      required: true,
    },
    editUrl: {
      type: String,
      required: true,
    },
    destroyUrl: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      actionType: "",
      modalHeader: "",
      modalBody: "",
    };
  },
  methods: {
    openEditModal() {
      this.actionType = "edit";
      this.modalHeader = "Caution";
      this.modalBody = "do you want to edit this note?";
      this.openModal();
    },
    openDestroyModal() {
      this.actionType = "destroy";
      this.modalHeader = "Alerts";
      this.modalBody = "do you want to delete this note?";
      this.openModal();
    },
    openModal() {
      this.$refs.modal.openModal();
    },
    action() {
      if (this.actionType === "edit") {
        window.location.href = this.editUrl;
      }
      if (this.actionType === "destroy") {
        this.$refs.form.submit();
      }
    },
  },
};
</script>
