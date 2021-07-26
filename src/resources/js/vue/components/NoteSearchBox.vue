<template>
  <div class="search-box-vue">
    <note-tag-input
      :tags="tags"
      @update:tags="tags = $event"
    />
    <button type="button" @click="search()">
      <ion-icon name="search-outline" class="search-box-icon"></ion-icon>
    </button>

    <form action="/notes" method="get">
      <input v-for="(tag, index) in inputTags" :key="tag.id" :name="'tags[' + index + ']'" :value="tag">
      <button type="submit">submit</button>
    </form>
  </div>
</template>

<script>
import NoteTagInput from "./parts/TagInput";

export default {
  components: {
    NoteTagInput,
  },
  props: {
    indexUrl: {
      type: String,
      required: true,
    }
  },
  data() {
    return {
      tags: [],
    };
  },
  computed: {
    inputTags: function () {
      return this.tags.map(tag => {
        return tag.value;
      })
    },
  },
  methods: {
    search() {
      console.log("check");
    }
  },
};
</script>
