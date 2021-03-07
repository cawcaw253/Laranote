<template>
  <div class="tag-input">
    <div class="selected-list">
      <div class="tag">
        <span
          v-for="(tag, index) in selectedTagList"
          :key="tag.id"
          :style="{
            'background-color': tag.color_code,
            color: tag.contrast_font_color,
          }"
        >
          {{ tag.title }}
          <a href="#" @click="unselect(index)">
            <i
              class="fas fa-times pl-0.5"
              :style="{ color: tag.contrast_font_color }"
            ></i>
          </a>
        </span>
      </div>
    </div>
    <input
      type="text"
      v-model="input"
      placeholder="Search tag from here"
      @keydown.enter="enter"
      @keydown.down="down"
      @keydown.up="up"
      @input="change"
    />
    <ul :class="{ 'is-empty': matchedList.length <= 0 }">
      <li
        v-for="(suggestion, index) in matchedList"
        v-bind:class="{ active: isActive(index) }"
        v-bind:key="index"
        @click="suggestionClick(currentIndex)"
      >
        <a href="#">{{ suggestion.title }}</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    selectedTagList: {
      type: Object,
      required: false,
      default: () => [],
    },
  },
  data() {
    return {
      input: "",
      currentIndex: 0,
      open: false,
      suggestions: [
        {
          id: 1,
          title: "PHP",
          color_code: "#8993be",
          contrast_font_color: "#000000",
        },
        {
          id: 2,
          title: "Laravel",
          color_code: "#fb503b",
          contrast_font_color: "#FFFFFF",
        },
        {
          id: 3,
          title: "Vue",
          color_code: "#42b883",
          contrast_font_color: "#FFFFFF",
        },
        {
          id: 4,
          title: "Golang",
          color_code: "#64c8c8",
          contrast_font_color: "#000000",
        },
      ],
    };
  },
  computed: {
    matchedList() {
      if (this.input.length <= 0) {
        return [];
      }
      return this.suggestions.filter((suggest) => {
        return (
          suggest.title.toLowerCase().includes(this.input.toLowerCase()) &&
          !this.selectedIdList.includes(suggest.id)
        );
      });
    },
    selectedIdList() {
      return this.selectedTagList.map((tag) => {
        return tag.id;
      });
    },
  },
  methods: {
    enter(e) {
      e.preventDefault();
      if (this.matchedList.length <= 0) return;
      this.select();
    },
    up() {
      if (this.currentIndex > 0) this.currentIndex--;
    },
    down() {
      if (this.currentIndex < this.matchedList.length - 1) this.currentIndex++;
    },
    isActive(index) {
      return index === this.currentIndex;
    },
    change() {
      if (this.open == false) {
        this.open = true;
        this.currentIndex = 0;
      }
    },
    suggestionClick(index) {
      if (this.matchedList.length <= 0) return;
      this.select(index);
    },
    select(index) {
      const targetIndex = index ? index : this.currentIndex;

      if (
        this.selectedTagList.find(
          (tag) => tag.title === this.matchedList[targetIndex].title
        )
      )
        return;

      this.selectedTagList.push(this.matchedList[targetIndex]);
      this.open = false;
      this.input = "";
    },
    unselect(index) {
      this.selectedTagList.splice(index, 1);
    },
  },
};
</script>
