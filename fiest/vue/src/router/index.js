import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Index from '@/components/Index'
import Shop from '@/components/Shop'
import Login from '@/components/Login'
import User from '@/components/User'
import Product from '@/components/Product'
import MemberUser from "@/components/MemberUser";
import Buycar from "@/components/Buycar";
import Dress from "@/components/Dress";
import Order from "@/components/Order";
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/Index',
      name: 'Index',
      component: Index
    },
    {
      path: '/Shop',
      name: 'Shop',
      component: Shop
    },
    {
      path: '/Login',
      name: 'Login',
      component: Login
    },
    {
      path: '/User',
      name: 'User',
      component: User
    },
    {
      path: '/MemberUser',
      name: 'MemberUser',
      component: MemberUser
    },
    {
      path: '/Product',
      name: 'Product',
      component: Product
    },
    {
      path: '/Buycar',
      name: 'Buycar',
      component: Buycar
    },
    {
      path: '/Dress',
      name: 'Dress',
      component: Dress
    },
    {
      path: '/Order',
      name: 'Order',
      component: Order
    }
  ]
})
