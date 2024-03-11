import './bootstrap';
import {createApp} from "vue";
import App from "../views/pages/App.vue";
import router from "./router.js";

createApp(App)
    .use(router)
    .mount('#app')