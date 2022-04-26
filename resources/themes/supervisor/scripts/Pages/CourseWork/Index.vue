<template>
    <app-layout title="Courseworks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courseworks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <data-table :value="courseWorks" dataKey="uuid">
                        <column field="uuid" header="ID" @click="">
                            <template #body="slotProps">
                                <a :href="route('supervisor.course-works.show', {course_work: slotProps.data.uuid})"
                                   v-text="slotProps.data.uuid"/>
                            </template>
                        </column>
                        <column field="name" header="Name"></column>
                        <column field="student" header="Student"></column>
                        <column field="status" header="Status"></column>
                    </data-table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent, computed, ref} from 'vue'
import AppLayout from '@supervisor/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },
    setup(props, {attrs}) {
        const courseWorks = computed(() => attrs.data.data);
        const selectedCourseWork = ref(null)

        return {
            courseWorks,
            selectedCourseWork,
        }
    }
})
</script>
