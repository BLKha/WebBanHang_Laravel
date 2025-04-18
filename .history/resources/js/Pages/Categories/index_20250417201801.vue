<template>
    <div>
        <Menu></Menu>
        <h1>Trang thể loại</h1>
    </div>
</template>

<script>
import axios from 'axios';
import Menu from '../includes/menu.vue';

    export default {
        components:{
        Menu
        },
        data(){
            return{
                categories:[],
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
            this.fetchCategories();
        },
        methods: {
            async fetchCategories(){
                try{
                    const response= await axios.get("http://127.0.0.1:8000/api/categories");
                    this.categories =response.data;
                }catch(error){
                    console.error("Error fetching categories: ",error);
                    this.
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>