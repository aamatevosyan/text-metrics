<template>
    <Accordion class="mt-8 mb-8 ml-2 mr-2 flex flex-col">
        <AccordionTab v-for="document in documents" :key="document.uuid">
            <template #header>
                <i class="fa-solid fa-file-lines"></i>
                <span class="ml-2 mr-3">{{ document.uuid ?? 'Not processed' }} - {{ document.created_at }}</span>
                <prime-button @click.stop="preview(document.url)" label="Preview" class="p-button-link"/>
            </template>
            <document-details :document="document">

            </document-details>
        </AccordionTab>
    </Accordion>
</template>

<script>
import DocumentDetails from "./DocumentDetails.vue";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";


export default {
    name: "CourseWorkDetails",
    components: {
        DocumentDetails,
        Accordion,
        AccordionTab,
    },
    props: {
        documents: {
            type: Array,
            required: true,
        }
    },
    methods: {
        preview(url) {
            window.open(url, '_blank');
        }
    }
}
</script>

<style scoped>

</style>
