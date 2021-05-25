<template>
    <app-layout>
        <template #content>

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
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <jet-label for="description" value="Description" />
                        <textarea
                            class="border-gray-300 mt-2 focus:border-green-300 w-full focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            name="description"
                            id="description"
                            rows="6"></textarea>
                        <jet-input-error :message="form.errors.title" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <jet-label for="date" value="Date" />
                        <jet-input id="date" ref="date" type="date" class="mt-1 block w-full" v-model="form.date" autocomplete="date" />
                        <jet-input-error :message="form.errors.date" class="mt-2" />
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

export default {
    components: {
        AppLayout,
        JetFormSection,
        JetLabel,
        JetInput,
        JetInputError,
        JetActionMessage,
        JetButton
    },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                date: "",
                description: ""
            })
        }
    },
    mounted() {
        flatpickr("#date", {
            enableTime: true
        });
    }
}
</script>

<style>

</style>
