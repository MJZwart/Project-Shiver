// TODO Figure out why my VSCode is complaining about these imports
import './assets/main.css';
import './websockets.ts';
import 'uno.css';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router/router.ts';

const app = createApp(App);

app.use(router);

app.mount('#app');
