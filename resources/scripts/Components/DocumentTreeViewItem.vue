<template>
    <div class="flex-col">
        <div class="flex flex-col">
            <b v-if="type === 'heading'">{{ label }}</b>
            <p v-else>{{ label }}</p>

            <divider v-if="showDetailsButton" layout="horizontal">
                <div class="flex items-center place-content-evenly">
                    <prime-button
                        icon="pi pi-comments"
                        class="p-button-sm p-button-rounded p-button-outlined mr-4"
                        @click.prevent.stop="display = true"
                    />

                    <prime-button
                        icon="pi pi-comments"
                        class="p-button-sm p-button-rounded p-button-outlined mr-4"
                        @click.prevent.stop="display = true"
                    />
                    <prime-button
                        icon="pi pi-comments"
                        class="p-button-sm p-button-rounded p-button-outlined mr-4"
                        @click.prevent.stop="display = true"
                    />
                    <prime-button
                        icon="pi pi-comments"
                        class="p-button-sm p-button-rounded p-button-outlined mr-4"
                        @click.prevent.stop="display = true"
                    />
                </div>

                <prime-dialog header="Header" footer="Footer" v-model:visible="display" :maximizable="true"
                              :modal="true">
                    {{ paragraph }}

                    {{ metrics }}
                </prime-dialog>
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
        paragraph: {
            type: String,
            required: false,
        },
        metrics: {
            type: Object,
            required: false,
        }
    },
    data() {
        return {
            display: false,
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
