<template>
    <tree :value="document.content">
        <template #default="slotProps" class="flex-col">
            <document-tree-view-item :type="slotProps.node.data.type" :uuid="slotProps.node.data.uuid"
                                     :paragraph="getParagraph(slotProps.node.data.uuid)"
                                     :label="slotProps.node.label"
            >
            </document-tree-view-item>
        </template>
        <!--        <template #url="slotProps">-->
        <!--            <a :href="slotProps.node.data">{{ slotProps.node.label }}</a>-->
        <!--        </template>-->
    </tree>
</template>

<script>
import DocumentTreeViewItem from "./DocumentTreeViewItem.vue";

export default {
    name: "DocumentDetails",
    components: {
        DocumentTreeViewItem,
    },
    props: {
        document: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            nodes: document.content,
            expandedKeys: {},
        }
    },
    methods: {
        getParagraph(uuid) {
            if (this.document.paragraphs.hasOwnProperty(uuid)) {
                return this.document.paragraphs[uuid];
            }

            return undefined;
        }
    }
}
</script>

<style scoped>
.p-button {
    margin: 0.3rem .5rem;
}

p {
    margin: 0;
}

.p-dialog .p-button {
    min-width: 6rem;
}
</style>
