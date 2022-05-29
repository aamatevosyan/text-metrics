<template>
    <app-layout title="Courseworks">
        <toast/>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <course-work-details :documents="courseWork.documents.data">

                   </course-work-details>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent, computed, ref} from 'vue'
import AppLayout from '@supervisor/Layouts/AppLayout.vue'
import Fieldset from "primevue/fieldset";
import Divider from "primevue/divider";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";
import CourseWorkDetails from "@/Components/CourseWorkDetails.vue";

export default defineComponent({
    components: {
        CourseWorkDetails,
        AppLayout,
        Fieldset,
        Divider,
        Toolbar,
        Button,
    },
    setup(props, {attrs}) {
        const courseWork = computed(() => attrs.data);

        // const selectedCourseWork = ref(null)
        //
        // return {
        //     courseWorks,
        //     selectedCourseWork,
        // }

        return {
            courseWork,
        }
    }
})
</script>
