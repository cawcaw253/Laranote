<template>
  <div class="search-box-vue">
    <note-tag-input
      :tags="tags"
      @update:tags="tags = $event"
    />
    <button type="submit">
      <ion-icon name="search-outline" class="search-box-icon"></ion-icon>
    </button>
  </div>
</template>

<script>
import NoteTagInput from "./parts/TagInput";

export default {
  components: {
    NoteTagInput,
  },
  data() {
    return {
      tags: [],
    };
  },
  mounted() {
    console.log(this.test);
    console.log(this.data);
  },
};
</script>
