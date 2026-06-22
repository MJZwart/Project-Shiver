import './assets/main.css';
import './assets/win.css';
import './websockets.ts';
import 'uno.css';
import './http.ts';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router.ts';

const app = createApp(App);

app.use(router);

app.mount('#app');
