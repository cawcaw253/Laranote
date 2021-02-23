import { createApp } from 'vue';

import NoteViewerComponent from '../components/NoteViewer.vue';

require('../../modules/markdown');

const app = createApp({
  components: {
    NoteViewerComponent,
  }
});

app.mount("#app");