import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../Pages/HomeView.vue'
import ContactView from '@/Pages/ContactView.vue'
import LoginView from '@/Pages/LoginView.vue'
import RegisterView from '@/Pages/RegisterView.vue'
import ForgotView from '@/Pages/ForgotView.vue'
import QrisView from '@/Pages/QrisView.vue'
import CodView from '@/Pages/CodView.vue'
import MenuView from '@/Pages/MenuView.vue'
import PembayaranView from '@/Pages/PembayaranView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView,
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/forgot-password',
      name: 'forgot-password',
      component: ForgotView,
    },
    {
      path: '/qris',
      name: 'qris',
      component: QrisView,
    },
    {
      path: '/cod',
      name: 'cod',
      component: CodView,
    },
    {
      path: '/menu',
      name: 'menu',
      component: MenuView,
    },
    {
      path: '/pembayaran',
      name: 'pembayaran',
      component: PembayaranView,
    },
  ],
})

export default router
