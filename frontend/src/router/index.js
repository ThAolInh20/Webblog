import { createRouter, createWebHistory } from 'vue-router';
import UserList from '@/components/Users/UserList.vue';
import UserAdd from '@/components/Users/UserAdd.vue';

const routes = [
    { path: '/', redirect: '/users' }, // Mặc định chuyển đến danh sách users
    { path: '/users', component: UserList },
    { path: '/users/add', component: UserAdd}
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
