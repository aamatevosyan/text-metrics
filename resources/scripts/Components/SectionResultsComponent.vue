<template>
    <vue-json-pretty :data="results"></vue-json-pretty>
</template>

<script>
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';

export default {
    name: "SectionResultsComponent",
    props: {
        results: Object,
    },
    components: {
        VueJsonPretty,
    },
}
</script>

<style scoped>

</style>
