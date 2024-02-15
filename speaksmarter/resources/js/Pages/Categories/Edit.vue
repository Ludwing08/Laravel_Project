<script>
export default {
    name: 'CategoriesEdit'
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Category/CategoryForm.vue';

const props = defineProps({
    category: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.category.name
})

</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-bold text-xl leading-tight"> Edit Category </h2>
        </template>
        <div class="mt-4">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg px-4 py-6">
                    <CategoryForm :updating="true" :form="form" @submit="form.put(route('categories.update', category.id))" />
                </div>
            </div>
        </div>


    </AppLayout>
</template>