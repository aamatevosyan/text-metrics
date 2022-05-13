<template>
    <div class="flex-col">
        <div class="flex flex-col">
            <b v-if="type === 'heading'">{{ label }}</b>
            <p v-else>{{ label }}</p>

            <divider v-if="showDetailsButton" layout="horizontal">
                <prime-tag v-for="badge in badges" :key="badge" class="mr-2"
                           :severity="badge.positive ? 'info' :
                'danger'" :value="badge.group"/>
            </divider>
        </div>
        <divider v-if="showDetailsButton" type="dotted"/>
    </div>
</template>

<script>
export default {
    name: "DocumentTreeViewItem",
    props: {
        label: {
            type: String,
            required: true,
        },
        uuid: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        badges: {
            type: Array,
            required: true,
        }
    },
    computed: {
        showDetailsButton() {
            return this.type === 'paragraph' || this.type === 'list-item';
        }
    }
}
</script>

<style scoped>

</style>
