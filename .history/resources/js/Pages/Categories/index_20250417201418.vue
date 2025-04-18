<template>
    <div>
        <Menu></Menu>
        <h1>Trang thể loại</h1>
    </div>
</template>

<script>
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
            async fetchCategories()
        },
    }
</script>

<style lang="scss" scoped>

</style>