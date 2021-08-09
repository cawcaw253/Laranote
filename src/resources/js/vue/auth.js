import { createApp } from 'vue';

import LoginPageComponent from './components/LoginPage.vue';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({
    components: {
        LoginPageComponent,
    }
});

app.mount("#auth");
