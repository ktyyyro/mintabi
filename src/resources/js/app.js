import './bootstrap'
import Vue from 'vue'
import Vuetify from '../plugins/vuetify'
import FollowButton from './components/FollowButton'

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    components: {
        FollowButton
    }
});
