import '../css/app.css'
import { createApp } from 'vue'
import SitesGrid from './components/SitesGrid.vue'

createApp(SitesGrid, { sites: window.CORBIDEV_SITES ?? [] })
  .mount('#corbidev-sites-app')
