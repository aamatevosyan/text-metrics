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
                    <Accordion class="mt-8 mb-8 ml-2 mr-2 flex flex-col">
                        <AccordionTab v-for="document in courseWork.documents.data" :key="document.uuid">
                            <template #header>
                                <i class="pi pi-paperclip"></i>
                                <span class="ml-2 mr-3">{{document.uuid}}</span>
                                <Button @click.stop="preview(document.url)" label="Preview" class="p-button-link"/>
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
import AppLayout from '@supervisor/Layouts/AppLayout.vue'
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

        const preview = (url) => {
            window.open(url, '_blank');
        }
        // const selectedCourseWork = ref(null)
        //
        // return {
        //     courseWorks,
        //     selectedCourseWork,
        // }

        return {
            courseWork,
            preview
        }
    }
})
</script>
