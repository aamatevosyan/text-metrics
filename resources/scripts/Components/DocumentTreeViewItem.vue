<template>
    <div class="flex-col">
        <div class="flex flex-col">
            <b v-if="type === 'heading'">{{ label }}</b>
            <p v-else class="mt-4">{{ label }}</p>

            <div v-if="showDetailsButton" class="flex m-2 p-2">
                <prime-tag v-for="badge in badges" :key="badge" class="mr-2"
                           :severity="badge.positive ? 'success' :
                'danger'" :value="badge.group"/>
            </div>
        </div>
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
