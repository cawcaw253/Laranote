<template>
  <div>
    <div class="note-view">
      <div class="note-view-section mt-4">
        <div class="note-view-section-display-header">
          <div class="note-view-section-display-header-title">{{ title }}</div>
          <div class="note-view-section-display-header-info">
            <span>Created At : {{ createdAt }}</span>
            <span>Updated At : {{ updatedAt }}</span>
          </div>
        </div>
      </div>
      <!-- <div class="note-create-section">
          <div class="note-create-section-field">
            <label>
              Tags
            </label>
            <div class="flex flex-wrap w-full content-around mb-2">
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-blue-200 text-blue-700 rounded-full">
                PHP
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-green-200 text-green-700 rounded-full">
                Vue
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-orange-200 text-orange-700 rounded-full">
                AWS
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-red-200 text-red-700 rounded-full">
                Laravel
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-gray-200 text-gray-700 rounded-full">
                DB
              </div>
              <button
                class="shadow border border-hot-orange hover:bg-hot-orange hover:text-white focus:shadow-outline focus:outline-none text-hot-orange font-bold text-xs px-4 py-1 ml-4 rounded-full"
                type="button">
                Add
              </button>
            </div>
          </div>
        </div> -->
      <div class="note-view-section">
        <div class="note-view-section-display-contents">
          <pre>{{ contents }}</pre>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    contents: {
      type: String,
      required: true,
    },
    createdAt: {
      type: String,
      required: true,
    },
    updatedAt: {
      type: String,
      required: true,
    },
  },
  data() {
    return {};
  },
};
</script>
