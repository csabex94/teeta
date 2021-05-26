<template>
    <app-layout>

        <template #content>

            <div class="w-full grid grid-cols-2 gap-4">

                <today-tasks :tasks="tasks" />

                <div class="w-full h-full rounded-md">
                    <span class="block mb-5 text-xl text-gray-500 text-center">Upcoming Tasks</span>

                    <div class="flex items-center rounded-md shadow-lg text-white bg-gray-700 px-2 py-4 justify-between">
                        <div class="flex items-center">
                            <jet-checkbox/>
                            <span class="ml-2 font-semibold">John's Birthday</span>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-green-400 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6  hover:text-green-400 cursor-pointer ml-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>


        </template>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetCheckbox from '@/Jetstream/Checkbox';
    import TodayTasks from '@/Components/TodayTasks';
    import moment from 'moment';

    export default {
        components: {
            AppLayout,
            JetCheckbox,
            TodayTasks
        },
        props: {
          tasks: Array
        },
        data() {
            return {
                months: null,
                currentMonth: null,
            }
        },
        mounted() {
            this.currentMonth = moment.months()[moment().month()];
            this.months = moment.months();
        },
    }
</script>
