<template>
  <div class="search-box-vue">
    <note-tag-input
      :tags="tags"
      @update:tags="tags = $event"
      v-on:keydown="watchInput"
    />
    <button type="button" @click="search()">
      <ion-icon name="search-outline" class="search-box-icon"></ion-icon>
    </button>

    <form action="/notes" method="get">
      <input v-for="(tag, index) in inputTags" :key="tag.id" :name="'tags[' + index + ']'" :value="tag">
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
      oldTags: [],
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
  watch: {
    inputTags(newValue, oldValue) {
      this.oldTags = oldValue;
    }
  },
  methods: {
    watchInput(e) {
      if (e.keyCode === 13) {
        console.log(this.inputTags.length);
        console.log('Enter was pressed');
      }
    },
  },
};
</script>
