<template>
  <div class="search-box-vue">
    <note-tag-input
      :tags="tags"
      @update:tags="tags = $event"
    />
    <button type="button" @click="search()">
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
  props: {
    searchUrl: {
      type: String,
      required: true,
    }
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
  methods: {
    async search() {
      console.log("check");
      await axios.post(this.searchUrl, {
          tags: this.tags
        });
    }
  },
};
</script>
