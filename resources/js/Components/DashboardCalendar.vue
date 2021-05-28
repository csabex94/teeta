<template>
    <div class="text-center mb-5">
        <h2 class="text-xl text-gray-500 mb-5 font-semibold">Events Calendars</h2>
        <calendar
            class="custom-calendar max-w-full"
            :masks="masks"
            :attributes="attributes"
            disable-page-swipe
            is-expanded
        >
            <template v-slot:day-content="{ day, attributes }">
                <div class="flex border border-gray-600 flex-col rounded-md h-32 z-10 my-1 mx-1 overflow-hidden" :class="markTodayBox(day)">
                    <span class="day-label text-sm text-gray-900">{{ day.day }}</span>
                    <div class="flex-grow overflow-y-auto overflow-x-auto">
                        <p
                            v-for="(attr, i) in attributes"
                            :key="attr.key"
                            class="text-xs leading-tight rounded-sm p-1 mt-0 mb-1"
                            :class="markTodayBox(i)"
                        >
                            {{ attr.customData.title }}
                        </p>
                    </div>
                </div>
            </template>
        </calendar>
    </div>
</template>

<script>
import {Calendar} from 'v-calendar';
import moment from 'moment';

export default {
    components: {
        Calendar
    },
    data() {
        const month = new Date().getMonth();
        const year = new Date().getFullYear();
        return {
            masks: {
                weekdays: 'WWW',
            },
            attributes: [
                {
                    key: 1,
                    customData: {
                        title: 'Lunch with mom.',
                        class: 'bg-red-600 text-white',
                    },
                    dates: new Date(year, month, 1),
                }
            ],
        };
    },
    methods: {
        markTodayBox(day) {
            if (day.day === new Date().getDate()) {
                return 'bg-red-400'
            } else {
                return ''
            }
        }
    },
}
</script>


