<template>
    <element
        v-for="route in routes"
        :title="route.title"
        :route-name="route.name"
        :children="route.children"
    />
</template>

<script>
import Element from "./Element.vue"
import {defineComponent} from "vue";

export default defineComponent({
    name: "NavigationMenu",
    components: {
        Element
    },
    props: {
        routes: {
            required: true,
            default: [],
            type: Array,
        }
    }
})
</script>

<style scoped>

</style>
