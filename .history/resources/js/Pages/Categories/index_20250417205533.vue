<template>
    <div>
        <Menu></Menu>
        <h1>Trang thể loại</h1>
        <div v-if="loading" class="text-center text-blue-600">Loading categories.....</div>
        <div v-else>
            <button @click="openModal(null)" class="bg-teal-500 text-white px-4 py-2 rounded mb-4">Thêm Loại SP</button>
        
        <table class="table-auto w-full border-collapse boder border-gray-800">
  <thead>
    <tr class="bg-gray-100 text-left">
        <th class="border border-gray-300 px-4 py-2">ID</th>
      <th class="border border-gray-300 px-4 py-2">Tên</th>
      <th class="border border-gray-300 px-4 py-2">Mô Tả</th>
      <th class="border border-gray-300 px-4 py-2">Quản Lý</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="category in categories" :key="category.id">
        <td>{{ category.id }}</td>
      <td>{{ category.name }}</td>
      <td>{{ category.description }}</td>
      <td>
        <button @click="openModal(category)" class="text-teal-600 hover:text-teal-800">Sửa</button>
        |
        <button @click="deleteCategory(category.id)" class="text-red-500 hover:text-red-800">Xóa</button>
      </td>

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