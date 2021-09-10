import { createApp } from 'vue';

import NoteSearchBoxComponent from './components/NoteSearchBox.vue';

const app = createApp({
  components: {
    NoteSearchBoxComponent,
  }
});

app.mount("#control-bar");
