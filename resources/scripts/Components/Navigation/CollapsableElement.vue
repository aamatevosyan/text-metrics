<template>
    <simple-element :title="title" :route-name="routeName">
        <slot>
            Test
        </slot>
    </simple-element>
</template>

<script>
import SimpleElement from "./SimpleElement.vue";
import {defineComponent} from "vue";

export default defineComponent({
    name: "NavigationCollapsableElement",
    components: {
        SimpleElement
    },
    props: {
        title: {
            required: true,
            type: String,
        },
        routeName: {
            required: false,
            type: String,
        },
    },
    computed: {}
})
</script>

<style scoped>

</style>
