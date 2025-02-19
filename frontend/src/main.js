import { createApp } from 'vue'
import App from './App.vue' 

import { ZiggyVue } from "ziggy-js";
import { Ziggy } from "./ziggy";

const app = createApp(App);
app.mount('#app');

app.use(ZiggyVue, Ziggy);
