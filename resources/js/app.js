// require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap'

Vue.use(VueRouter)

import App from './views/app'
import Home from './views/home'
import Products from './views/Products'
import CreateProducts from './views/CreateProduct'
import updateProducts from './views/updateProducts'
import Suppliers from './views/Suppliers'
import SuppliersProductsView from './views/supplierDetails'
import createSupplier from './views/createSupplier'
import UpdateSupplier from './views/UpdateSupplier'
import SupplierProducts from './views/SupplierProducts'
import Order from './views/Order'
import OrderDetails from './views/OrderDetails'
import Login from './views/login'
import Register from './views/register'
import Dashboard from './views/dashboard'

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
            path: '/api/register',
            name: 'register',
            component: Register
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/products',
            name: 'products',
            component: Products
        },
         {
            path: '/products/create',
            name: 'products.create',
            component: CreateProducts
        },
            {
            path: '/products/edit/:id',
            name: 'products.edit',
            component: updateProducts
        },
        {
            path: '/suppliers',
            name: 'suppliers',  
            component: Suppliers
        },
        {
             path: '/suppliers/:id/supplierproducts',
            name: 'suppliers.products',  
            component: SuppliersProductsView
        },
        {
            path: '/suppliers/create',
            name: 'suppliers.create',
            component: createSupplier
        },
        {
            path: '/suppliers/edit/:id',
            name: 'suppliers.edit',
            component: UpdateSupplier
        },
         {
            path: '/supplierProducts',
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


