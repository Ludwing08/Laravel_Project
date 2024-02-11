<script>
export default {
    name: "CategoriesIndex",
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    categories: {
        type: Object,
        required: true
    }
})

const deleteCategory = id => {
    if (confirm('Are you sure want to delete this category?')) {
        Inertia.delete(route('categories.destroy', id ));
    }
}

</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-bold text-xl leading-tight"> Categories </h2>
        </template>

        <div class="mt-4">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg px-4 py-6" v-if="$page.props.user.permissions.includes('Create Categories')" >
                    <Link  :href="route('categories.create')"
                        class="bg-slate-800 hover:bg-slate-700 rounded-md px-3 py-2 text-white uppercase focus:ring-2 focus:ring-offset-2 focus: ring-indigo-500">
                    CREATE CATEGORY </Link>
                    <ul role="list" class="divide-y divide-gray-100">                        
                        <li class="flex justify-evenly py-5" v-for="category in categories.data">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{category.name}}</p>
                            </div>

                            <div class="flex gap-x-3">
                                <Link :href="route('categories.edit', [category.id])"
                                    class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                                Edit</Link>
                                <Link @click="deleteCategory(category.id)"
                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Delete</Link>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </AppLayout></template>
