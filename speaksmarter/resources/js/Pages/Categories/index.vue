<script>
export default {
    name: "CategoriesIndex",
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

defineProps({
    categories: {
        type: Object,
        required: true
    }
})

const deleteCategory = id => {
    if (confirm('Are you sure want to delete this category?')) {
        router.delete(route('categories.destroy', id));
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
                <div class="bg-white rounded-lg px-4 py-6"
                    v-if="$page.props.user.permissions.includes('Create Categories')">
                    <Link :href="route('categories.create')"
                        class="bg-slate-800 hover:bg-slate-700 rounded-md px-3 py-2 text-white uppercase focus:ring-2 focus:ring-offset-2 focus: ring-indigo-500">
                    CREATE CATEGORY </Link>
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between py-5" v-for="category in categories.data">
                            <div class="min-w-0 ml-5">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ category.name }}</p>
                            </div>

                            <div class="flex gap-x-3 mr-5">
                                <Link :href="route('categories.edit', category.id)"
                                    v-if="$page.props.user.permissions.includes('Update Categories')"
                                    class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                                Edit</Link>
                                <Link @click="deleteCategory(category.id)"
                                    v-if="$page.props.user.permissions.includes('Delete Categories')"
                                    class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                Delete</Link>
                            </div>
                        </li>

                    </ul>

                    <div class="flex justify-end gap-3 text-gray-400">
                        <Link :href="categories.prev_page_url" v-if="categories.current_page > 1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                        </svg>
                        </Link>

                        <Link :href="categories.next_page_url" v-if="categories.current_page < categories.last_page">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>
                        </Link>

                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
