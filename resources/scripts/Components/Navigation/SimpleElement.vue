<template>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <jet-nav-link :active="isActive"
                      :href="href">
            <slot>
                {{ title }}
            </slot>
        </jet-nav-link>
    </div>
</template>

<script>
import {computed, defineComponent} from 'vue'

export default defineComponent({
    name: "NavigationSimpleElement",
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
    setup(props) {
        const indexRoute = computed(() => props.routeName.endsWith('index') ? props.routeName : props.routeName +
            '.index')
        const href = computed(() => route(indexRoute.value))
        const isActive = computed(() => route().current(props.routeName + '.*'))

        return {
            href,
            isActive,
        }
    },
})
</script>

<style scoped>

</style>
