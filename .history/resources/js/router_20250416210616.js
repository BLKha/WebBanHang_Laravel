import { createRouter,createWebHistory } from "vue-router";
import Categories from "./components/Categories/index.vue"
import Brands from "./components/Brands/index.vue"
import Products from "./components/Products/index.vue"

const routes = [
    {
        path:"/categories",
        component: Categories,
    },
    {
        path:"/Brands",
        component: Categories,
    },
]