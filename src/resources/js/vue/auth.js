import { createApp } from 'vue';

import LoginPageComponent from './components/LoginPage.vue';
import RegisterPageComponent from './components/RegisterPage.vue';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({
    components: {
        LoginPageComponent,
        RegisterPageComponent,
    }
});

app.mount("#auth");
