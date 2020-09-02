
import Denuncias from '../components/Denuncias.vue'
import Victimas from '../components/Victimas.vue'
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
//Routes
export default new Router({
    routes : [
        {
            path : '/denuncias',
            name : 'denuncias',
            component : Denuncias
        },
        {
            path : '/victimas',
            name : 'victimas',
            component : Victimas
        },
    ],
    mode:'history'
})



