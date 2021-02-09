import { createApp } from 'vue';

import NoteEditorComponent from '../components/NoteEditor.vue';

require('axios');

const app = createApp({
  components: {
    NoteEditorComponent,
  }
});

app.mount("#app");