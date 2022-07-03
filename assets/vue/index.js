import { createApp } from "vue";
import App from "./App";
import store from './store/index'

import 'reset-css';
import '../styles/app.css';
import '../styles/fonts.css';

const app = createApp(App);
app.use(store);
app.mount('#app');