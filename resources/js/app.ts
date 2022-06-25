import { createApp } from 'vue';
import App from "./App.vue"
import './bootstrap';

const app = createApp({})
app.component('App', App)
app.mount('#app')