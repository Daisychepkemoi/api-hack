<template>
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
    <tr v-for="{ order_number, created_at } in orders">
      <th scope="row"></th>
      <td> {{ order_number }}</td>
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
            orders: null,
            error: null,
        };0
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.orders = null;
            this.loading = true;
            axios.get('/api/orders').then(response => {
                    this.loading = false;
                    this.orders = response.data.data;
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
/*  #orders table{
    width: 60%;
    background-color: ;
    font-size: 12px;
    padding: 5%;
    margin-left: 30%;
    margin-right: 5%;
    margin-top: 20px;
  }*/

</style>