import Vue from 'vue';
import VueRouter from 'vue-router';
import profile from './pages/profile.vue'
import master from './layouts/master.vue'

Vue.use(VueRouter);

export default new VueRouter({
   
    base: '/',
    routes:[
         {
            path : '/' ,
            component : master,
            children : [
                {
                    path: 'user/account/settings',
                    component: profile,
                    name: "edit_profile"
                },
     
               
     
            ],
         },
        ],
        mode: 'history',
})