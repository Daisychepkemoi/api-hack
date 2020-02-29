// require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap'

Vue.use(VueRouter)

import App from './views/app'
import Home from './views/Home'
import Products from './views/Products'
import Suppliers from './views/Suppliers'
import SupplierProducts from './views/SupplierProducts'
import Order from './views/Order'
import OrderDetails from './views/OrderDetails'
import Login from './views/Login'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    {
            path: '/api/login',
            name: 'login',
            component: Login
        },
        {
            path: '/products',
            name: 'products',
            component: Products
        },
        {
            path: '/suppliers',
            name: 'suppliers',
            component: Suppliers
        },
         {
            path: '/all',
            name: 'supplierProducts',
            component: SupplierProducts
        },
        {
            path: '/orders',
            name: 'orders',
            component: Order
        },
        {
            path: '/orderdetails',
            name: 'orderDetails',
            component: OrderDetails
        },
 
  
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});


