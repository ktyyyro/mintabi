import './bootstrap'
import Vue from 'vue'
import Vuetify from '../plugins/vuetify'
import NavBar from './components/NavBar'
import NavDrawer from './components/NavDrawer'
import CardComponent from './components/CardComponent'

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    components: {
        NavBar,
        NavDrawer,
        CardComponent
    }
});
