<template>
  <div class="note-view">
    <div class="note-view-section">
      <div class="note-view-section-display-header">
        <div class="note-view-section-display-header-title">{{ title }}</div>
        <div class="note-view-section-display-header-info">
          <div class="note-view-section-display-header-info-tags">
            Tags :
            <span
              v-for="tag in tags"
              :key="tag.id"
              :style="{
                'background-color': tag.color_code,
                color: tag.contrast_font_color,
              }"
            >
              {{ tag.title }}
            </span>
          </div>
          <div class="note-view-section-display-header-info-time">
            <span>Created At : {{ createdAt }}</span>
            <span>Updated At : {{ updatedAt }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="note-view-section-grow">
      <div class="note-view-section-display-contents">
        <article v-html="markdownContent" class="prose prose-fix"></article>
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
    tags: {
      type: Object,
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
  mounted() {
    document.querySelectorAll("img");
    // idk why markdown it image tag css not working before query
  },
  computed: {
    markdownContent: function () {
      return markdown.render(this.contents);
    },
  },
};
</script>
