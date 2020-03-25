<template>
    <div class="contain">
    <Navigation></Navigation>
        <div class="main" v-if="suppliers">
<!-- {{suppliers}} -->
            <h1>Update Ssupplier</h1>
            <div>
            <form @submit.prevent="updatesupplier(id)">
                <label for="name">Supplier Name</label>
                <div>
                    <input id="name" name="name" type="text"  v-model="name" required autofocus>
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
            suppliers: null,
        };
    },
     mounted() {
    this.id = this.$route.params.id // id of the article
    this.fetchsupplier(this.id)
  },

    methods: {
      fetchsupplier(id) {
          const token = sessionStorage.getItem('token')
      const URL = `/api/suppliers/${id}`
      axios({
        method: 'get',
        url: URL,
        headers: {
          'Content-Type': 'application/json',
          Authorization: `Bearer ${token}`
        }
      })
        .then(res => {

          this.suppliers = res.data
          console.log(res.data);
          // console.log(this.suppliers)
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    },

  updatesupplier(id) {

     const { name } = this
      const data = { name }
      const token = sessionStorage.getItem('token')
      const URL = `/api/suppliers/${id}/edit`
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
          this.$router.push('/suppliers')
        })
        .catch(err => {
          // eslint-disable-next-line
          console.log(err)
        })
    }
  }



}
</script>
}
</script>