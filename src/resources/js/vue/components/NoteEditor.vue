<template>
  <div>
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
            <div class="note-edit-section-field-contents">
              <Field
                v-show="currentTab === 'editor'"
                as="textarea"
                name="contents"
                v-model="formData.contents"
              />
              <div
                v-show="currentTab === 'preview'"
                class="note-edit-section-field-contents-preview"
              >
                <article v-html="markdownContent" class="prose"></article>
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
            <span>{{ tagError }}</span>
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
      tagError: null,
      currentTab: "editor",
      isModalOpen: false,
      modalData: {
        header: "",
        body: "",
      },
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
        this.formData.tags.push(tag.title)
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
  },
};
</script>
