import Vue from 'vue';
import Router from 'vue-router';
import Login from './components/login/Login.vue';
import Dashboard from './components/Dashboard.vue';
import Notification from './components/notification/Notification.vue';
import DetailNotification from './components/notification/DetailNotification.vue';

Vue.use(Router);
const routes = [
    {
        path: '/',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },{
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },{
        path: '/notification',
        name: 'notification',
        component: Notification,
    },{
        path: '/detail-notification/:id',
        name: 'detail-notification',
        component: DetailNotification,
    },
];

const router = new Router({
    routes: routes
});
export default router;