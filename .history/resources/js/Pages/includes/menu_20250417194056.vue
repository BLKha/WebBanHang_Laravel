<template>
    <div>

<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <Link :href="route('dashboard')" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Trang chủ</Link>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Company</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Team</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Features</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

    export default {
        comments:{
            Link
        },
        
    }
</script>

<style lang="scss" scoped>

</style>