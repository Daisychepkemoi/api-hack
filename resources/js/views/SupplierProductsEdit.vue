<template>
    <div class="contain">
       <Navigation></Navigation>
        <div class="main" v-if="products">
<!-- {{products}} -->
            <h1>Create a product</h1>
            <div v-for="product in products">
            <form @submit.prevent="updateProduct(id)">
                <label for="name">Product Name</label>
                <div>
                    <input id="name" name="name" type="text"  v-model="name" required autofocus>
                </div>
                <label for="description">Product Description </label>
                <div>
                    <input id="" type="text" name="description" v-model="description" required>
                </div>
                <label for="quantity">quantity</label>
                <div>
                    <input id="quantity" type="text" name="quantity" v-model="quantity" required>
                </div>
                <div>
                    <button type="submit" class="btn-success">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Navigation from './navigation';

export default {
    components: { 
  'Navigation': Navigation 
},
    data() {
        return {
            loading: false,
            name: "",
            description: "",
            quantity: "",
            products: null,
        };
    },
     mounted() {
    this.id = this.$route.params.id // id of the article
    this.fetchProduct(this.id)
  },

    methods: {
      fetchProduct(id) {
          const token = sessionStorage.getItem('token')
      const URL = `/api/products/${id}`
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {

          this.products = res.data
          this.name = res.data.name
          this.description = res.data.description
          this.quantity = res.data.description
          console.log(res.data);
          // console.log(this.products)
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },

  updateProduct(id) {

     const { name,description,quantity } = this
      const data = { name,description,quantity }
      const token = sessionStorage.getItem('token')
      const URL = `/api/products/${id}/edit`
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

