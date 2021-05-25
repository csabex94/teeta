<template>
    <app-layout>
        <template #content>

            <div class="py-10 mx-auto max-w-7xl lg:px-6">
                <jet-form-section>

                <template #title>
                    <h1 class="text-2xl text-gray-500">Create New Task</h1>
                </template>

                <template #description>
                    <p class="text-gray500">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </template>

                <template #form>

                    <div class="col-span-6">
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="block w-full mt-1" v-model="form.title" autocomplete="title" />
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <jet-label for="description" value="Description" />
                        <textarea
                            class="w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            name="description"
                            id="description"
                            v-model="form.description"
                            rows="6"></textarea>
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between col-span-6">
                        <div class="flex items-center text-sm font-medium text-gray-700">Daily <jet-checkbox v-model="form.daily" class="ml-2" /></div> 
                        <div class="flex items-center text-sm font-medium text-gray-700">Specific Date <jet-checkbox v-model="showSpecDateCalendar" class="ml-2" /></div> 
                        <div class="flex items-center text-sm font-medium text-gray-700">Remind Before <jet-checkbox v-model="showRemindOptions" class="ml-2" /></div> 
                        <div class="flex items-center text-sm font-medium text-gray-700">Email<jet-checkbox v-model="form.push_email" class="ml-2" /></div> 
                    </div>

                    <div v-if="showSpecDateCalendar" class="col-span-6">
                        <jet-label for="date" value="Select Date" />
                        <jet-input @click="test" id="date" type="date" class="block w-full mt-1" v-model="form.spec_date" />
                        <!-- <jet-input-error :message="form.errors.date" class="mt-2" /> -->
                    </div>

                </template>

                <template #actions>
                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </jet-button>

                    <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                        Saved.
                    </jet-action-message>
                </template>

            </jet-form-section>
            </div>

        </template>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from '@/Jetstream/FormSection';
import JetLabel from '@/Jetstream/Label';
import JetInput from '@/Jetstream/Input';
import JetInputError from '@/Jetstream/InputError';
import JetActionMessage from '@/Jetstream/ActionMessage';
import JetButton from '@/Jetstream/Button';
import JetCheckbox from '@/Jetstream/Checkbox';

export default {
    components: {
        AppLayout,
        JetFormSection,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetButton,
        JetCheckbox
    },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                date: "",
                description: "",
                daily: false,
                push_email: false,
                spec_date: ""
            }),
            showSpecDateCalendar: false,
            showRemindOptions: false,       
        }
    },
    mounted() {
        flatpickr("#date", { wrap: true })
    }
}
</script>

<style>

</style>
