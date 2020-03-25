<template>
    <div class="contain">
    <Navigation></Navigation>
        <div class="main" id="products">
            <div class="loading" v-if="loading">
                Loading...
            </div>
            <div v-if="error" class="error">
                <p> {{ error }}</p>
                <button @click.prevent="fetchData">
                    Try Again
                </button>
            </div>
            <div v-if="products" class="tables">
                <div style="width:70%; float:left;">
                    <H3> Products Data</H3>
                </div>
                <div style="width:30%; float:right; color:black;"><button class="btn-success" style="float:right; margin-right: 200px;">
                        <router-link :to="{ name: 'products.create' }">New</router-link>
                    </button> </div>
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
                        <tr v-for="product in products">
                            <th scope="row"></th>
                            <td> {{ product.name }}</td>
                            <td>{{ product.description }}</td>
                            <td>{{ product.quantity }}</td>
                            <!-- <td><button class="btn-info" @click="viewProduct(product.id)"> View </button></td> -->
                            <td> <router-link :to="`/products/edit/${product.id}`"><button class="btn-primary" >Edit</button></router-link> </td>
                            <td><button class="btn-danger" @click="deleteProduct(product.id)">Delete </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
        // Vue.component('pagination', require('laravel-vue-pagination'));

    import axios from 'axios';
    import Navigation from './navigation';

export default{
      components: { 
  'Navigation': Navigation 
},
    data() {
        return {
            loading: false,
            products: null,
            error: null,
        };0
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
          const token = sessionStorage.getItem('token')
      const URL = '/api/products'
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {
          this.products = res.data.data
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },
          
                deleteProduct(id) {
      const token = sessionStorage.getItem('token')
      const URL = `/api/products/${id}/delete`
     axios({
        method: 'post',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(_ => {
          this.fetchProducts()
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    }
  }
       
}
</script>
<style type="text/css">
.contain {
    width: 100%;
    /*height: 100%;*/
    background-color: ;
}

.contain .sidebar {
    width: 20%;
    float: left;
    height: 1000px;
    background-color: grey;
}

.contain .main {
    height: 600px;
    width: 80%;
    background-color: ;
    float: right;
}

.main .tables {
    background-color: ;
}

.tables table {
    width: 80%;
    background-color: ;
    font-size: 12px;
    /*padding: 5%;*/
    margin-left: 5%;
    /*margin-right: 5%;*/
    margin-top: 20px;
}

</style>
