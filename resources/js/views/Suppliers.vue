<template>
    <div class="main" id="suppliers">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

<div v-if="suppliers">	
  <h4>Supplier Details</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">supplier Name</th>
      <th scope="col">Date Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody v-if="suppliers">
    <tr v-for="{ name,created_at } in suppliers">
      <th scope="row"></th>
      <td> {{ name }}</td>
      <td>{{ created_at }}</td>
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
            suppliers: null,
            error: null,
        };0
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.suppliers = null;
            this.loading = true;
            axios.get('/api/suppliers').then(response => {
            		this.loading = false;
            		this.suppliers = response.data.data;
            		console.log(response);
        });

          
        }
    }
}
</script>
<style type="text/css">

</style>