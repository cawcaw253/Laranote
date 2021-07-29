<template>
  <div class="search-box-vue">
    <note-tag-input
      :tags="tags"
      @update:tags="tags = $event"
      v-on:keyup.enter="watchInput"
    />
    <button type="button" @click="search()">
      <ion-icon name="search-outline" class="search-box-icon"></ion-icon>
    </button>

    <form id="search-form" action="/notes" method="get">
      <input v-for="(tag, index) in inputTags" :key="tag.id" :name="'tags[' + index + ']'" :value="tag" type="hidden">
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
      oldLength: [],
      isNotChanged: false,
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
    watchInput(e) {
      const newLength = this.inputTags.length;
      if (newLength === this.oldLength && newLength !== 0) {
        this.search();
      }
      this.oldLength = newLength;
    },
    search() {
      document.getElementById('search-form').submit();
    }
  },
};
</script>
