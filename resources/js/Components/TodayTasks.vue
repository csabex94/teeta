<template>
    <div class="w-full h-full rounded-md">
        <span class="block mb-5 text-xl text-gray-500 text-center">Today's Tasks</span>
        <span v-if="tasks.length <= 0" class="block text-center text-gray-500 text-sm">Not tasks for today.</span>

        <div v-for="task in tasks" :key="task.id" class="mb-2 rounded-md shadow-lg text-white bg-gray-700 px-2 py-4">
            <div class="flex items-center justify-between px-2">
                <div>
                    <span class="font-semibold">{{ task.title }}</span>
                    <p class="text-xs">{{ task.description }}</p>
                </div>
                <jet-checkbox @change="completeTask(task.id)" />
            </div>
        </div>

    </div>
</template>

<script>
import JetCheckbox from '@/Jetstream/Checkbox';
import JetDialogModal from '@/Jetstream/DialogModal';
import JetSecondaryButton from '@/Jetstream/SecondaryButton';
import JetLabel from '@/Jetstream/Label';
import JetInput from '@/Jetstream/Input';
import JetButton from '@/Jetstream/Button';

import flatPickr from 'vue-flatpickr-component';

export default {
    components: {
      JetCheckbox,
      JetDialogModal,
      JetSecondaryButton,
      JetInput,
      JetLabel,
      JetButton,
      flatPickr
    },
    props: {
        tasks: Array
    },
    data() {
      return {

      }
    },
    methods: {
        completeTask(taskId) {
            this.$inertia.put(route('complete.task', { taskId: taskId }, {
                onSuccess: () => {}
            }))
        }
    }
}
</script>

