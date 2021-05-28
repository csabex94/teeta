<template>
    <app-layout>
        <template #content>
            <div class="py-10 mx-auto max-w-7xl lg:px-6">
                <jet-section-title>Events</jet-section-title>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>-</th>
                </thead>
                <tbody>
                    <tr v-for="event in events" :key="event.id">
                        <td>{{ $event.title }}</td>
                        <td>{{ $event.description }}</td>
                        <td>{{ $event.date }}</td>
                        <td>
                            <div class="flex items-center">
                                <inertia-link :href="'/events/edit/${event.id}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-green-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </inertia-link>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6  hover:text-green-400 cursor-pointer ml-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
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
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     //optional for column grouping

export default {
    props: ['events'],
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
              
        }
    },
    mounted() {
        
    }
}
</script>