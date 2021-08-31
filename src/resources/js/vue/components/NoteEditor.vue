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
            <div ref="contents" class="note-edit-section-field-contents" :class="{ focused: isFocusingContents }">
              <Field
                v-show="currentTab === 'editor'"
                as="textarea"
                name="contents"
                v-model="formData.contents"
                @focus="focusContents"
                @blur="blurContents"
              />
              <div
                v-show="currentTab === 'preview'"
                class="note-edit-section-field-contents-preview"
              >
                <article v-html="markdownContent" class="prose"></article>
              </div>
              <label class="note-edit-section-field-contents-uploader">
                <input type="file" accept=".gif,.jpeg,.jpg,.png" @change="inputImage" multiple>
                <span>Attach images by drag & drop, click and select them.</span>
              </label>
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
    };
  },
  computed: {
    markdownContent: function () {
      return markdown.render(this.formData.contents);
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
    inputImage(event) {
      let files = event.target.files;
      for(let i = 0; i<files.length; i++) {
        let imageData = new FormData();
        imageData.append('image', files[i]);
        this.uploadImage(imageData);
      }
      event.target.value = null;
    },
    uploadImage(image) {
      axios
        .post(this.imageUploadUrl, image)
        .then((response) => {
          const data = response.data;
          if (data.status === STATUS_OK) {
            this.setImageToContents(data.title, data.path);
          }
        })
        .catch((error) => {
          console.log(error);
        })
    },
    setImageToContents(title, path) {
      let image = '![' + title + '](' + path + ')' + LINE_BREAK
      if (this.formData.contents.indexOf("\n")==-1) {
        image = LINE_BREAK + image;
      }
      this.formData.contents += image;
    }
  },
};
</script>
