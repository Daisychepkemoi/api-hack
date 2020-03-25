<template>
 <div class="contain">
  <Navigation></Navigation>
    <div class="main" id="orders">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
           <p>   {{ error }}</p>
            <button @click.prevent="fetchData">
            Try Again
        </button>
        </div>

<div v-if="orders">   
  <H3>orders Data</H3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order Number</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-if="orders">
    <tr v-for="{ order_number, created_at,id } in orders">
      <th scope="row"></th>
      <td> {{ order_number }}</td>
      <td>{{ created_at }}</td>
      <td><router-link :to="`/order/${id}/orderdetails`"><button class="btn-info" > View Products</button></router-link> </td>
      <td><button class="btn-primary"> Edit </button></td>
      <td><button class="btn-danger" @click="deleteOredr(id)">Delete</button></td>

    </tr>
   
  </tbody>
</table>
</div>


        
    </div>
  </div>
</template>
<script>
import Navigation from './navigation';
import axios from 'axios';
export default {
  components: { 
  'Navigation': Navigation 
},
    data() {
        return {
            loading: false,
            orders: null,
            error: null,
        };0
    },
    created() {
        this.fetchOrder();
    },
    methods: {
    
        fetchOrder() {
          const token = sessionStorage.getItem('token')
      const URL = '/api/orders'
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          this.orders = res.data.data
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },
      deleteOrder(id) {
      const token = sessionStorage.getItem('token')
      const URL = `/api/orders/${id}/delete`
     axios({
        method: 'post',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(_ => {
          this.fetchOrder()
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    
  }
    }
}
</script>

 