<template>
    <div class="flex-col">
        <div class="m-4">
            <prime-tag v-for="badge in getBadges(document?.results)" :key="badge" class="mr-2"
                       :severity="badge.positive ?
    'info' :
                'danger'" :value="badge.group"/>
        </div>


        <tree :value="content" selectionMode="single" v-model:selectionKeys="selectedNodeKeys" :metaKeySelection="false"
              @node-select="onNodeSelect" @node-unselect="onNodeUnselect">
            <template #default="slotProps" class="flex">
                <document-tree-view-item :type="slotProps.node.data.type" :uuid="slotProps.node.data.uuid"
                                         :label="slotProps.node.label"
                                         :badges="getBadges(getSectionResult(slotProps.node.data.uuid))"
                >
                </document-tree-view-item>
            </template>
            <!--        <template #url="slotProps">-->
            <!--            <a :href="slotProps.node.data">{{ slotProps.node.label }}</a>-->
            <!--        </template>-->
        </tree>
        <prime-dialog header="" footer="" v-model:visible="display" :maximizable="true"
                      :modal="true"
                      @hide="onHideDialog"
        >
            {{ getSectionResult(selectedNode.uuid) }}
        </prime-dialog>
    </div>
</template>

<script lang="ts">
import DocumentTreeViewItem from "./DocumentTreeViewItem.vue";
import DocumentElement = Domain.DocumentProcessing.Services.Document.DocumentElement;
import {computed, reactive, ref} from "vue";
import {useToast} from "primevue/usetoast";

export default {
    name: "DocumentDetails",
    components: {
        DocumentTreeViewItem,
    },
    props: {
        document: {
            type: Object,
            required: false,
        }
    },
    setup: function (props: {
        document: { content: any; section_results: any; };
    }) {
        let content = reactive(props.document?.content)
        let expandedKeys = reactive({})
        let selectedNodeKeys = reactive({})
        let selectedNode = reactive({})
        let display = ref(false)

        if (props.document) {
            expandedKeys[props.document.uuid] = true
        }

        const onNodeSelect = (node: any) => {
            selectedNode = node
            display.value = true
        }

        const onNodeUnselect = (node: any) => {
            selectedNode = {}
            display.value = false
        }

        const onHideDialog = () => {
            selectedNodeKeys = {}
            selectedNode = {}
        }

        const getSectionResult = (uuid: string) => {
            if (props.document?.section_results?.hasOwnProperty(uuid)) {
                return props.document?.section_results[uuid]
            }

            return undefined;
        }

        const getBadges = (result: any) => {
            let data = []

            if (result?.hasOwnProperty('automated_readability_index')) {
                data.push({
                    'group': 'Readability',
                    'positive': result.automated_readability_index <= 40,
                })
            }

            if (result?.hasOwnProperty('ttr')) {
                data.push({
                    'group': 'Diversity',
                    'positive': result.ttr >= 0.5,
                })
            }

            if (result?.hasOwnProperty('times_new_roman')) {
                data.push({
                    'group': 'Font',
                    'positive': result.times_new_roman === 1,
                })
            }

            if (result?.hasOwnProperty('plagiat_percentage')) {
                data.push({
                    'group': result.type === 'document' ? `Plagiat - ${Math.floor(result.plagiat_percentage)}%` :
                        'Plagiat',
                    'positive': result.plagiat_percentage <= 40,
                })
            }

            if (result?.hasOwnProperty('cohesion')) {
                data.push({
                    'group': result.type === 'document' ? `Cohesion - ${result.cohesion}` :
                        'Cohesion',
                    'positive': result.cohesion >= 0.5,
                })
            }

            return data
        }

        return {
            content,
            expandedKeys,
            selectedNodeKeys,
            selectedNode,
            display,
            onNodeSelect,
            onNodeUnselect,
            onHideDialog,
            getSectionResult,
            getBadges,
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
