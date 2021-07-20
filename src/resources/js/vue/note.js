import { createApp } from 'vue';

import NoteViewerComponent from './components/NoteViewer.vue';
import NoteEditorComponent from './components/NoteEditor.vue';
import NoteSearchBoxComponent from './components/NoteSearchBox.vue';

require('../modules/markdown');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({
  components: {
    NoteViewerComponent,
    NoteEditorComponent,
    NoteSearchBoxComponent,
  }
});

app.mount("#app");
