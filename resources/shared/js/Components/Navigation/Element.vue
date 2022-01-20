<template>
    <simple-element v-if="isSimpleElement" :title="title" :route-name="routeName"/>
    <collapsable-element v-else :title="title" :route-name="routeName"/>
</template>

<script>
import {computed, defineComponent} from 'vue'
import SimpleElement from "./SimpleElement";
import CollapsableElement from "./CollapsableElement";

export default defineComponent({
    name: "NavigationElement",
    components: {
        SimpleElement,
        CollapsableElement,
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
        children: {
            required: false,
            default: [],
            // type: Array,
        }
    },
    setup(props) {
        const isSimpleElement = computed(() => props.children.length === 0)

        return {
            isSimpleElement
        }
    },
})
</script>

<style scoped>

</style>
