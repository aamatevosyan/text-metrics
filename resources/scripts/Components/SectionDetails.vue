<template>
    <tab-view>
        <tab-panel v-if="results" header="Results">
            <section-results-component :results="results" />
        </tab-panel>
        <tab-panel v-if="comment || $isSupervisor" header="Comments">
            <section-comments-component :comment="comment" :uuid="uuid" :url="url" />
        </tab-panel>
    </tab-view>
</template>

<script>
import SectionCommentsComponent from "./SectionCommentsComponent.vue";
import SectionResultsComponent from "./SectionResultsComponent.vue";

export default {
    name: "SectionDetails",
    props: {
        results: Object,
        comment: String,
        uuid: String,
        url: String,
    },
    components: {
        SectionResultsComponent,
        SectionCommentsComponent,
    }
}
</script>

<style scoped>

</style>
