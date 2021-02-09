import { createApp } from 'vue';

import NoteViewerComponent from '../components/NoteViewer.vue';
import NoteControlbarComponent from '../components/NoteControlbar.vue';

const app = createApp({
  components: {
    NoteViewerComponent,
    NoteControlbarComponent,
  }
});

app.mount("#app");