import { createApp } from 'vue'

import Main from './Main'
import store from './store'
import router from './router'

const app = createApp(Main) // Creating the app using Vue.js

app.use(store) // Uses the store using vuex

app.use(router) // The app will use router for the route

app.mount("#app") // Mount the app to the app id element/attribute