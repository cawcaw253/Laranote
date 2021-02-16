import { createApp } from 'vue';

import NoteViewerComponent from '../components/NoteViewer.vue';

const app = createApp({
  components: {
    NoteViewerComponent,
  }
});

app.mount("#app");