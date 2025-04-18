<template>
    <div>
        <Menu></Menu>
        <h1 class="text-center text-5xl">Quản lý Brand</h1>
        <div v-if="loading" class="text-center text-blue-600">Loading brands.....</div>
        <div v-else>
            <button @click="openModal(null)" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Thêm Brand</button>
        
        <table class="table-auto w-full border-collapse boder border-gray-800">
  <thead>
    <tr class="bg-gray-500 text-left text-white">
        <th class="border border-gray-300 px-4 py-2">ID</th>
      <th class="border border-gray-300 px-4 py-2">Tên</th>
      <th class="border border-gray-300 px-4 py-2">Mô Tả</th>
      <th class="border border-gray-300 px-4 py-2">Quản Lý</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="brand in brands" :key="brand.id" class="hover:bg-blue-100">
        <td class="border border-gray-300 px-4 py-2 text-center">{{ brand.id }}</td>
      <td class="border border-gray-300 px-4 py-2 text-center">{{ brand.name }}</td>
      <td class="border border-gray-300 px-4 py-2 text-center">{{ brand.description }}</td>
      <td class="border border-gray-300 px-4 py-2 text-center">
        <button @click="openModal(brand)" class="text-teal-600 hover:text-teal-800">Sửa</button>
        |
        <button @click="deleteBrand(brand.id)" class="text-red-500 hover:text-red-800">Xóa</button>
      </td>

    </tr>
   
    </tbody>
    </table>
        <!-- Modal for adding/editing brands -->
        <div v-if="isModalOpen" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
             <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h2 class="text-xl font-semibold mb-4">{{ isEditing ? 'Edit brand' : 'Add brand' }}</h2>

                    <form @submit.prevent="handleSubmit">
                         <div class="mb-4">
                          <label for="name" class="block text-sm font-semibold">Name</label>
                              <input type="text" id="name" v-model="form.name"
                                        class="w-full p-2 border border-gray-300 rounded" placeholder="brand Name"
                                        required />
                                </div>

                         <div class="mb-4">
                             <label for="description" class="block text-sm font-semibold">Description</label>
                             <input type="text" id="description" v-model="form.description"
                                        class="w-full p-2 border border-gray-300 rounded" placeholder="brand Description" />
                                </div>

                     <div class="flex justify-end">
                      <button type="button" @click="closeModal" class="mr-4 text-gray-500">Cancel</button>
                         <button type="submit" class=" text-dark px-4 py-2 rounded" :hover>
                           {{ isEditing ? 'Save Changes' : 'Add brand' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

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
                brands:[],
                loading:true,
                error:null,
                isModalOpen:false,
                isEditing:false,
                form:{
                    id:null,
                    name:'',
                    description:'',
                }
            }
            
        },
        mounted() {
            this.fetchBrands();
        },
        methods: {
            async fetchBrands(){
                try{
                    const response= await axios.get("http://127.0.0.1:8000/api/brands");
                    this.brands =response.data;
                    console.log(this.brands);
                }catch(error){
                    console.error("Error fetching brands: ",error);
                    this.error = "Failed to load brands. Please try again later.";
                }finally{
                    this.loading= false;
                }
            },
            openModal(brand) {
            if (brand) {
                this.isEditing = true;
                this.form = { ...brand }; // Pre-fill form for editing
            } else {
                this.isEditing = false;
                this.form = { id: null, name: '', description: '' }; // Reset form for adding
            }
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },

        async deleteBrand(id) {
            try {
                if (confirm('Are you sure you want to delete this brand?')) {
                    // Make the DELETE request to the API
                    await axios.delete(`http://127.0.0.1:8000/api/brands/${id}`);
                    this.brands = this.brands.filter(brand => brand.id !== id); // Remove from local state
                    alert('brand deleted successfully.');
                }
            } catch (error) {
                console.error('Error deleting brand:', error);
                alert('Failed to delete brand.');
            }
        },
        async handleSubmit() {
            if (this.isEditing) { //Edit
                await this.updateBrand();
            } else { //Add
                await this.addBrand();
            }
            this.closeModal();
        },
        async addBrand() {
            try {
                const response = await axios.post("http://127.0.0.1:8000/api/brands", this.form);
                this.brands.push(response.data); // Add new brand to local list
            } catch (error) {
                console.error("Error adding brand:", error);
            }
        },
        async updateBrand() {
            try {
                const response = await axios.put(`http://127.0.0.1:8000/api/brands/${this.form.id}`, this.form);
                const index = this.brands.findIndex(brand => brand.id === this.form.id);
                if (index !== -1) {
                    this.brands[index] = response.data; // Update the brand in the local list
                }
            } catch (error) {
                console.error("Error updating brand:", error);
            }
        },
        }
    }
</script>

<style lang="scss" scoped>

</style>