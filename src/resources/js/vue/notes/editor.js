import { createApp } from 'vue';

import NoteEditorComponent from '../components/NoteEditor.vue';

require('../../modules/markdown');
require('axios');

const app = createApp({
  components: {
    NoteEditorComponent,
  }
});

app.mount("#app");