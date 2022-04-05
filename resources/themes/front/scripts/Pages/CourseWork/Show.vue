<template>
    <app-layout title="Courseworks">
        <toast/>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Courseworks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Toolbar>
                        <template #start>
                            <document-upload :uuid="courseWork.uuid"></document-upload>
                        </template>

                        <template #end>
                        </template>
                    </Toolbar>

                    <Accordion>
                        <AccordionTab v-for="document in courseWork.documents.data" :key="document.uuid">
                            <template #header>
                                <i class="pi pi-paperclip"></i>
                                <span class="ml-2 mr-3">{{document.uuid}}</span>

                                <a :href="document.url" download>Preview</a>
                            </template>
                            <p>Some content</p>
                        </AccordionTab>
                    </Accordion>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent, computed, ref} from 'vue'
import AppLayout from '@front/Layouts/AppLayout.vue'
import DocumentUpload from "@front/Components/DocumentUpload.vue"
import Toast from "primevue/toast";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import Fieldset from "primevue/fieldset";
import Divider from "primevue/divider";
import Toolbar from "primevue/toolbar";
import Button from "primevue/button";

export default defineComponent({
    components: {
        AppLayout,
        DocumentUpload,
        Toast,
        Accordion,
        AccordionTab,
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
            courseWork
        }
    }
})
</script>
