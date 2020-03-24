<template>
    <div class="contain">
        <div class="sidebar">
 
            <ul>
                <li>
                    <router-link :to="{ name: 'products' }">Products</router-link>
                </li>
                <hr>
                <li>
                    <router-link :to="{ name: 'suppliers' }">supplier</router-link>
                </li>
                <hr>
                <li>
                    <router-link :to="{ name: 'supplierProducts' }">supplierProducts</router-link>
                </li>
                <hr>
                <li>
                    <router-link :to="{ name: 'orders' }">Order</router-link>
                </li>
                <hr>
                <li>
                    <router-link :to="{ name: 'orderDetails' }">Order Details</router-link>
                </li>
                <hr>
            </ul>
        </div>
        <div class="main">
            <h1>Create a product</h1>
            <form @submit.prevent="createProduct">
                <label for="name">Product Name</label>
                <div>
                    <input id="name" type="text" v-model="name" required autofocus>
                </div>
                <label for="description">Product Description </label>
                <div>
                    <input id="" type="text" v-model="description" required>
                </div>
                <label for="quantity">quantity</label>
                <div>
                    <input id="quantity" type="text" v-model="quantity" required>
                </div>
                <div>
                    <button type="submit" class="btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            name: "",
            description: "",
            quantity: "",
        };0
    },
    // created() {
    //     this.fetchData();
    // },
    methods: {
   

          
  


createProduct() {

     const { name,description,quantity } = this
      const data = { name,description,quantity }
      const token = sessionStorage.getItem('token')
      const URL = '/api/products/create'
      axios({
        method: 'post',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        },
        data: data
      })
        .then(_ => {
          this.$router.push('/products')
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
