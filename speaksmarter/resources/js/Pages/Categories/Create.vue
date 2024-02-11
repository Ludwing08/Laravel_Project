<script>
export default {
    name: 'CategoriesCreate'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Category/CategoryForm.vue';

const form = useForm({
    name: ''
})

</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-bold text-xl leading-tight"> Create Category </h2>
        </template>
        <div class="mt-4">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg px-4 py-6">
                    <CategoryForm :form="form" @submit="form.post(route('categories.store'))" />
                </div>
            </div>
        </div>


    </AppLayout>
</template>