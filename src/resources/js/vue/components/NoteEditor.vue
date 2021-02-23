<template>
  <div>
    <div v-show="errors" class="error-messages">
      <ul>
        <li v-for="error in errors" :key="error.id">- {{ error[0] }}</li>
      </ul>
    </div>
    <div class="note-edit">
      <Form
        :validation-schema="schema"
        v-slot="{ isSubmitting }"
        @submit="onSubmit"
      >
        <div class="note-edit-section">
          <div class="note-edit-section-field">
            <label for="title"> Title </label>
            <Field name="title" v-model="formData.title" />
            <ErrorMessage name="title" />
          </div>
        </div>
        <!-- <div class="note-edit-section">
          <div class="note-edit-section-field">
            <label>
              Tags
            </label>
            <div class="flex flex-wrap w-full content-around mb-2">
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-blue-200 text-blue-700 rounded-full">
                PHP
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-green-200 text-green-700 rounded-full">
                Vue
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-orange-200 text-orange-700 rounded-full">
                AWS
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-red-200 text-red-700 rounded-full">
                Laravel
              </div>
              <div
                class="text-xs items-center font-bold leading-sm uppercase px-4 py-1 ml-3 bg-gray-200 text-gray-700 rounded-full">
                DB
              </div>
              <button
                class="shadow border border-hot-orange hover:bg-hot-orange hover:text-white focus:shadow-outline focus:outline-none text-hot-orange font-bold text-xs px-4 py-1 ml-4 rounded-full"
                type="button">
                Add
              </button>
            </div>
          </div>
        </div> -->
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
  </div>
</template>

<script>
import { Field, Form, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
  components: {
    Field,
    Form,
    ErrorMessage,
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
      },
      noteId: null,
      preventPress: false,
      errors: null,
      currentTab: "editor",
    };
  },
  computed: {
    markdownContent: function () {
      return markdown.render(this.formData.contents);
    },
  },
  mounted() {
    if (this.propTitle && this.propContents) {
      this.formData.title = this.propTitle;
      this.formData.contents = this.propContents;

      this.isUpdate = true;
    }
  },
  methods: {
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
          });
      }
    },
    toggleTabs(id) {
      this.currentTab = id;
    },
  },
};
</script>
