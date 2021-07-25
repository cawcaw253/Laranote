<template>
<div>
  <tagify 
    :value="tagInputs"
    :settings="settings"
    :onChange="onChange"
  />
</div>
</template>

<script>
import Tagify from '@yaireo/tagify/dist/tagify.vue';

export default {
  components: {
    Tagify
  },
  props: {
    tags: {
      type: Array,
      required: false,
    },
  },
  emits: ['update:tags'],
  mounted() {
    if (this.tags) {
      this.tagInputs = this.tags;
    }
  },
  data() {
    return {
      tagInputs: [],
      suggestions: [],
    };
  },
  computed: {
    settings: function () {
      return {
        transformTag: this.transformTag,
        whitelist: this.suggestions
      }
    }
  },
  methods: {
    onChange(event) {
      let tempTags = event.target.value.length > 0 ? JSON.parse(event.target.value) : []
      this.updateTags(tempTags);
    },
    updateTags(tempTags) {
      this.$emit('update:tags', tempTags.map((tag) => {
        return { value: tag.value, color: tag.color };
      }));
    },
    transformTag(tagData) {
      if (tagData.color) {
        tagData.style = "--tag-bg:" + tagData.color + "; " + "--tag-text-color:" + this.contrastColor(tagData.color);
      } else {
        const tagColor = "#CCCCCC";
        tagData.style = "--tag-bg:" + tagColor + "; " + "--tag-text-color:" + this.contrastColor(tagColor);
        tagData.color = tagColor;
      }
    },
    generateRandomColor() {
      // Not using now
      return "#" + (Math.random() * 0xfffff * 1000000).toString(16).slice(0, 6);
    },
    contrastColor(hexColor) {
      const rgb = this.hex2rgb(hexColor);

      // Counting the perceptive luminance - human eye favors green color... 
      const luminance = (0.299 * rgb.r + 0.587 * rgb.g + 0.114 * rgb.b) / 255;

      return luminance > 0.56
        ? '#000000' // bright colors - black font
        : '#FFFFFF'; // dark colors - white font
    },
    hex2rgb(hexColor) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hexColor);
      return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
      } : null;
    }
  },
};
</script>
