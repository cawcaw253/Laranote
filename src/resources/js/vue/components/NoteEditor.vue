<template>
  <div class="note-edit">
    <div v-if="errors" class="error-messages">
      <ul>
        <li v-for="error in errors" :key="error.id">- {{ error[0] }}</li>
      </ul>
    </div>
    <Form
      :validation-schema="schema"
      v-slot="{ isSubmitting }"
      @submit="confirmSubmit"
    >
      <div class="note-edit-section">
        <div class="note-edit-section-field">
          <label for="title"> Title </label>
          <Field name="title" v-model="formData.title" />
          <ErrorMessage name="title" />
        </div>
        <div class="note-edit-section">
          <div class="note-edit-section-field">
            <label for="contents"> Contents </label>
            <div class="note-edit-section-field-tab">
              <nav>
                <button
                  type="button"
                  @click="toggleTabs('editor')"
                  v-bind:class="{ active: currentTab === 'editor' }"
                >
                  Editor
                </button>
                <button
                  type="button"
                  @click="toggleTabs('preview')"
                  v-bind:class="{ active: currentTab === 'preview' }"
                >
                  Preview
                </button>
              </nav>
            </div>
            <div ref="contents" class="note-edit-section-field-contents" :class="{ focused: isFocusingContents }" @drop="dropImage" @dragover="dragover" @dragleave="dragleave">
              <template v-if="currentTab === 'editor'">
                <Field
                  as="textarea"
                  name="contents"
                  v-model="formData.contents"
                  @focus="focusContents"
                  @blur="blurContents"
                />
                <label class="note-edit-section-field-contents-uploader">
                  <input ref="file" type="file" accept=".gif,.jpeg,.jpg,.png" @change="inputImage" multiple>
                  <span>Attach images by drag & drop, click and select them.</span>
                </label>
              </template>
              <template v-if="currentTab === 'preview'">
                <div class="note-edit-section-field-contents-preview">
                  <article v-html="markdownContent" class="prose"></article>
                </div>
              </template>
            </div>
            <ErrorMessage name="contents" />
          </div>
        </div>
      </div>
      <div class="note-edit-section">
        <div class="note-edit-section-field">
          <label> Tags </label>
          <note-tag-input
            :tags="formData.tags"
            @update:tags="formData.tags = $event"
          />
        </div>
      </div>
      <div class="note-edit-section">
        <div class="note-edit-section-field">
          <button
            class="submit"
            :class="{ 'animate-pulse': isSubmitting }"
            :disabled="isSubmitting || preventPress"
          >
            <span v-if="this.isUpdate">Update</span>
            <span v-else>Post</span>
          </button>
        </div>
      </div>
    </Form>

    <!-- preview test -->
    <div v-for="image in formImages" :key="image.key">
      <div>
        {{ image.name }}
        <img :src="image.src">
      </div>
    </div>

    <!-- Modal -->
    <note-modal
      :header="modalData.header"
      :body="modalData.body"
      :is-active="isModalOpen"
      @close-event="closeModal()"
      @submit-event="onSubmit()"
    />
  </div>
</template>

<script>
import { Field, Form, ErrorMessage } from "vee-validate";
import NoteTagInput from "./parts/TagInput";
import NoteModal from "./parts/Modal";
import * as yup from "yup";

const STATUS_OK = 'ok';
const LINE_BREAK = '\r\n';
const TEMP_PATH = 'progressing image upload...';
const UPLOAD_ERROR_MESSAGE = 'Upload failed... The current server is unstable. Please try again later.'

export default {
  components: {
    Field,
    Form,
    ErrorMessage,
    NoteTagInput,
    NoteModal,
  },
  props: {
    postUrl: {
      type: String,
      required: true,
    },
    imageUploadUrl: {
      type: String,
      required: true,
    },
    propTitle: {
      type: String,
      required: false,
    },
    propContents: {
      type: String,
      required: false,
    },
    propTags: {
      type: Object,
      required: false,
    },
    propTagList: {
      type: Object,
      required: true,
    },
  },
  data() {
    const schema = yup.object({
      title: yup.string().required().min(5),
      contents: yup.string().required().min(10),
    });
    return {
      schema,
      isUpdate: false,
      formData: {
        title: "",
        contents: "",
        tags: [],
      },
      noteId: null,
      preventPress: false,
      errors: null,
      currentTab: "editor",
      isModalOpen: false,
      modalData: {
        header: "",
        body: "",
      },
      isFocusingContents: false,
      queuedImages: [],
    };
  },
  computed: {
    markdownContent: function () {
      return markdown.render(this.formData.contents);
    },
  },
  watch: {
    queuedImages: {
      handler(images) {
        if (images.length > 0) {
          this.uploadImage(images.shift());
        }
      },
      deep: true,
    },
  },
  mounted() {
    if (this.propTitle && this.propContents) {
      // update
      this.formData.title = this.propTitle;
      this.formData.contents = this.propContents;
      this.propTags.forEach((tag) => {
        this.formData.tags.push({value: tag.title, color: tag.color_code})
      });

      this.modalData.header = "Update this note";
      this.modalData.body = "are you sure overwrite this note?";

      this.isUpdate = true;
    } else {
      // new
      this.modalData.header = "Create new note";
      this.modalData.body = "are you want save this note?";
    }
  },
  methods: {
    focusContents() {
      this.isFocusingContents = true;
    },
    blurContents() {
      this.isFocusingContents = false;
    },
    confirmSubmit() {
      this.isModalOpen = true;
    },
    closeModal() {
      this.isModalOpen = false;
    },
    async onSubmit() {
      this.errors = null;
      this.preventPress = true;
      if (this.isUpdate) {
        await axios
          .put(this.postUrl, this.formData)
          .then((response) => {
            window.location.href = response.data.redirect_url;
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.preventPress = false;
            this.isModalOpen = false;
          });
      } else {
        await axios
          .post(this.postUrl, this.formData)
          .then((response) => {
            window.location.href = response.data.redirect_url;
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.preventPress = false;
            this.isModalOpen = false;
          });
      }
    },
    toggleTabs(id) {
      this.currentTab = id;
    },
    dragover(event) {
      event.preventDefault();
      if (!event.currentTarget.classList.contains('dragover')) {
        event.currentTarget.classList.add('dragover');
      }
    },
    dragleave(event) {
      event.currentTarget.classList.remove('dragover');
    },
    dropImage(event) {
      event.preventDefault();
      this.progressUpload(event.dataTransfer.files)
    },
    inputImage(event) {
      this.progressUpload(event.target.files)
      event.target.value = null;
    },
    progressUpload(images) {
      for(let i = 0; i<images.length; i++) {
        const file = images[i];
        const line = (this.formData.contents.indexOf(LINE_BREAK)==-1) ? LINE_BREAK : '';
        const temp = '![' + file.name + '](' + TEMP_PATH + ')';

        this.formData.contents += (line + temp + LINE_BREAK);
        this.queuedImages.push({
          image: images[i],
          name: images[i].name,
          temp: temp,
        });
      }
    },
    async uploadImage(imageObject) {
      let path = null;
      let imageData = new FormData();
      imageData.append('image', imageObject.image);
      await axios
        .post(this.imageUploadUrl, imageData)
        .then((response) => {
          path = (response.data.status === STATUS_OK) ? response.data.path.replace(/ /g, '%20') : UPLOAD_ERROR_MESSAGE;
        })
        .catch((error) => {
          console.error(error);
          path = UPLOAD_ERROR_MESSAGE;
        })
        .finally(() => {
          this.setImageToContents(imageObject, path);
        })
    },
    setImageToContents(imageObject, path) {
      let imagePath = '![' + imageObject.name + '](' + path + ')';
      this.formData.contents = this.formData.contents.replace(imageObject.temp, imagePath);
    }
  },
};
</script>
