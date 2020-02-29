<template>
    <div class="main" id="supplierproducts">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
           <p>   {{ error }}</p>
            <button @click.prevent="fetchData">
            Try Again
        </button>
        </div>
        <!-- <p>{{supplierproducts}}</p> -->

<div v-if="supplierproducts">   
  <H3 style="">Products Data</H3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Supplier ID</th>
      <th scope="col">Products ID</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-if="supplierproducts">
    <tr v-for="{ suppliers_id, products_id,created_at } in supplierproducts">
      <th scope="row"></th>
      <td> {{ suppliers_id }}</td>
      <td>{{ products_id }}</td>
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
            supplierproducts: null,
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
            axios.get('/api/supplierProducts').then(response => {
                    this.loading = false;
                    this.supplierproducts = response.data.data;
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
  #supplierproducts table{
    width: 60%;
    background-color: ;
    font-size: 12px;
    padding: 5%;
    margin-left: 30%;
    margin-right: 5%;
    margin-top: 20px;
  }

</style>