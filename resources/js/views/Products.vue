<template>
    <div class="main" id="products">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
           <p>	 {{ error }}</p>
            <button @click.prevent="fetchData">
            Try Again
        </button>
        </div>

<div v-if="products">	
  <H3>Products Data</H3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-if="products">
    <tr v-for="{ name, description,quantity } in products">
      <th scope="row"></th>
      <td> {{ name }}</td>
      <td>{{ description }}</td>
      <td>{{ quantity }}</td>
      <td><button class="btn-info"> View	</button></td>
      <td><button class="btn-primary"> Edit	</button></td>
      <td><button class="btn-danger">Delete	</button></td>

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
            products: null,
            error: null,
        };0
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.products = null;
            this.loading = true;
            axios.get('/api/products').then(response => {
            		this.loading = false;
            		this.products = response.data.data;
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
/*  #products table{
    width: 60%;
    background-color: ;
    font-size: 12px;
    padding: 5%;
    margin-left: 30%;
    margin-right: 5%;
    margin-top: 20px;
  }*/

</style>