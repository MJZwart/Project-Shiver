// TODO Figure out why my VSCode is complaining about these imports
import './assets/main.css';
import './websockets.ts';
import 'uno.css';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router.ts';

import axios from 'axios';
// @ts-ignore
window.axios = axios;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp(App);

app.use(router);

app.mount('#app');
