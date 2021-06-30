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
import NoteModal from "./parts/Modal";
import * as yup from "yup";
import Tagify from "@yaireo/tagify";

export default {
  components: {
    Field,
    Form,
    ErrorMessage,
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
    tagSelector: function () {
      return this.formData.contents;
    },
  },
  mounted() {
    if (this.propTitle && this.propContents) {
      // update
      this.formData.title = this.propTitle;
      this.formData.contents = this.propContents;
      this.formData.tags = this.propTags;

      this.modalData.header = "Update this note";
      this.modalData.body = "are you sure overwrite this note?";

      this.isUpdate = true;
    } else {
      // new
      this.modalData.header = "Create new note";
      this.modalData.body = "are you want save this note?";
    }

    var input = document.querySelector('[name=contents]'),

    tagify = new Tagify(input, {
        //  mixTagsInterpolator: ["{{", "}}"],
        mode: 'mix',  // <--  Enable mixed-content
        pattern: /#/,  // <--  Text starting with @ or # (if single, String can be used here)
        tagTextProp: 'text',  // <-- the default property (from whitelist item) for the text to be rendered in a tag element.
        // Array for initial interpolation, which allows only these tags to be used
        whitelist: ['Homer simpson', 'Marge simpson', 'Bart', 'Lisa', 'Maggie', 'Mr. Burns', 'Ned', 'Milhouse', 'Moe'],
        dropdown : {
            enabled: 1,
            position: 'text', // <-- render the suggestions list next to the typed text ("caret")
            mapValueTo: 'text', // <-- similar to above "tagTextProp" setting, but for the dropdown items
            highlightFirst: true  // automatically highlights first sugegstion item in the dropdown
        },
        callbacks: {
            add: console.log,  // callback when adding a tag
            remove: console.log   // callback when removing a tag
        }
    })

    console.log(tagify);

    // A good place to pull server suggestion list accoring to the prefix/value
    tagify.on('input', function(e){
        var prefix = e.detail.prefix;

        // first, clean the whitlist array, because the below code, while not, might be async,
        // therefore it should be up to you to decide WHEN to render the suggestions dropdown
        // tagify.settings.whitelist.length = 0;

        if( prefix ){
            if( prefix == '@' )
                tagify.whitelist = ['Homer simpson', 'Marge simpson', 'Bart', 'Lisa', 'Maggie', 'Mr. Burns', 'Ned', 'Milhouse', 'Moe'];

            if( prefix == '#' )
                tagify.whitelist = ['Homer simpson', 'Marge simpson', 'Bart', 'Lisa', 'Maggie', 'Mr. Burns', 'Ned', 'Milhouse', 'Moe'];

        if(e.detail.value.length > 1)
          tagify.dropdown.show(e.detail.value);
        }

        console.log( tagify.value );
        console.log('mix-mode "input" event value: ', e.detail)
    })

    tagify.on('add', function(e){
        console.log(e)
    })
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
