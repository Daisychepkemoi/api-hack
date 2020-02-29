<template>
    <div class="main" id="orderDetails">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
           <p>   {{ error }}</p>
            <button @click.prevent="fetchData">
            Try Again
        </button>
        </div>

<div v-if="orderDetails">   
  <H3>orderDetails Data</H3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Products ID</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-if="orderDetails">
    <tr v-for="{ orders_id,products_id, created_at } in orderDetails">
      <th scope="row"></th>
      <td> {{ orders_id }}</td>
      <td> {{ products_id }}</td>
      <td>{{ created_at }}</td>
      <td><button class="btn-info"> View    </button></td>
      <td><button class="btn-primary"> Edit </button></td>
      <td><button class="btn-danger">Delete </button></td>

    </tr>
   
  </tbody>
</table>
</div>


        
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            orderDetails: null,
            error: null,
        };0
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.orderDetails = null;
            this.loading = true;
            axios.get('/api/orderDetails').then(response => {
                    this.loading = false;
                    this.orderDetails = response.data.data;
                    console.log(response);
        }).catch(error => {
            this.loading = false;
            this.error = error.response.data.message || error.message;
        });;

          
        }
    }
}
</script>

 
<style type="text/css">
/*  #orderDetails table{
    width: 60%;
    background-color: ;
    font-size: 12px;
    padding: 5%;
    margin-left: 30%;
    margin-right: 5%;
    margin-top: 20px;
  }*/

</style>