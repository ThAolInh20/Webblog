import { createApp } from 'vue'
import App from './App.vue' 
import router from './router';

// import { ZiggyVue } from "ziggy-js";
// import { Ziggy } from "./ziggy";

const app = createApp(App);
app.use(router);
app.mount('#app');

// app.use(ZiggyVue, Ziggy);
