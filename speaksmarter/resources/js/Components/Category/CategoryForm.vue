<script>
export default {
    name: 'CategoryForm'
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


defineProps({    

    form: {
        type: Object,
        required: true
    },

    updating: {
        type: Boolean,
        required: false,
        default: false
    }
})

//comunicacion con el padre para enviar los datos del formulario al servidor
defineEmits(['submit'])

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            Form of categories
        </template>

        <template #description>
            {{ updating ? "Update Category" : "New Category" }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" class="block text-sm font-medium text-gray-700" />
                <TextInput v-model="form.name" name="name" id="name" type="text" placeholder="Category name" class="mt-1 block w-full" />                                
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>


    </FormSection>
</template>