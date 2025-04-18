<template>
    <div>
        <Menu></Menu>
        <h1>Trang thể loại</h1>
        <div v-if="loading" class="text-center text-blue-600">Loading categories.....</div>
        <div v-else>
            <button @click="openModal(null)" class="bg-teal-500 text-white px-4 py-2 rounded mb-4">Thêm Loại SP</button>
        
        <table class="table-auto">
  <thead>
    <tr>
      <th>Tên</th>
      <th>Mô Tả</th>
      <th>Quản Lý</th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
      <td>Malcolm Lockyer</td>
      <td>1961</td>
    </tr>
   
    </tbody>
    </table>
</div>
    </div>
</template>

<script>
import axios from 'axios';
import Menu from '../includes/menu.vue';

    export default {
        components:{
        Menu,
        axios
        },
        data(){
            return{
                categories:[],
                loading:true,
                error:null,
                // isModalOpen:false,
                // isEditing:false,
                // form:{
                //     id:null,
                //     name:'',
                //     description:'',
                // }
            }
            
        },
        mounted() {
            this.fetchCategories();
        },
        methods: {
            async fetchCategories(){
                try{
                    const response= await axios.get("http://127.0.0.1:8000/api/categories");
                    this.categories =response.data;
                    console.log(this.categories);
                }catch(error){
                    console.error("Error fetching categories: ",error);
                    this.error = "Failed to load categories. Please try again later.";
                }finally{
                    this.loading= false;
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>