<template>
    <div class="flex-col">
        <div class="m-4">
            <prime-tag v-for="badge in getBadges(document?.results, true)" :key="badge" class="mr-2"
                       :severity="badge.positive ?
    'success' :
                'danger'" :value="badge.group"/>
        </div>


        <tree :value="content" selectionMode="single" v-model:selectionKeys="selectedNodeKeys" :metaKeySelection="false"
              @node-select="onNodeSelect" @node-unselect="onNodeUnselect">
            <template #default="slotProps" class="flex">
                <document-tree-view-item :type="slotProps.node.data.type" :uuid="slotProps.node.data.uuid"
                                         :label="slotProps.node.label"
                                         :badges="getBadges(getSectionResult(slotProps.node.data.uuid), false,
                                         getComments(slotProps.node.data.uuid))">
                </document-tree-view-item>
            </template>
            <!--        <template #url="slotProps">-->
            <!--            <a :href="slotProps.node.data">{{ slotProps.node.label }}</a>-->
            <!--        </template>-->
        </tree>
        <prime-dialog v-if="display" header="" footer="" v-model:visible="display" :maximizable="true"
                      :modal="true"
                      @hide="onHideDialog"
        >
            <section-details :uuid="Object.keys(selectedNodeKeys)[0]"
                             :results="getSectionResult(Object.keys(selectedNodeKeys)[0])"
                             :comment="getComments(Object.keys(selectedNodeKeys)[0])"
                             :url="getCommentUrl(Object.keys(selectedNodeKeys)[0])"
            />
        </prime-dialog>
    </div>
</template>

<script lang="ts">
import DocumentTreeViewItem from "./DocumentTreeViewItem.vue";
import {computed, inject, reactive, ref, watch} from "vue";
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';
import SectionDetails from "@/Components/SectionDetails.vue";

export default {
    name: "DocumentDetails",
    components: {
        SectionDetails,
        DocumentTreeViewItem,
        VueJsonPretty
    },
    props: {
        document: {
            type: Object,
            required: false,
        }
    },
    setup: function (props: {
        document: { content: any; section_results: any; comments: any; uuid: string };
    }) {
        let content = reactive(props.document?.content)
        let expandedKeys = reactive({})
        let selectedNodeKeys = reactive({})
        let selectedUuid = ref('')
        let currentSectionResults = reactive({})
        let currentComments = reactive({})

        let isSupervisor = inject('isSupervisor')

        let display = ref(false)

        if (props.document) {
            expandedKeys[props.document.uuid] = true
        }

        const onNodeSelect = (node: any) => {
            let uuid = node.key

            selectedUuid = uuid
            currentSectionResults = getSectionResult(uuid)
            currentComments = getComments(uuid)
            display.value = !!currentSectionResults || !!currentComments || isSupervisor
        }

        const onNodeUnselect = (node: any) => {
            currentSectionResults = {}
            currentComments = {}
            display.value = false
        }

        const onHideDialog = () => {
            currentSectionResults = {}
            currentComments = {}
            display.value = false
        }

        const getCommentUrl = (uuid) => {
            if (isSupervisor) {
                return route('supervisor.course-works.add-comment', {
                    document: props.document.uuid,
                    uuid: uuid
                })
            }

            return undefined
        }

        const getSectionResult = (uuid: string) => {
            if (props.document?.section_results?.hasOwnProperty(uuid)) {
                return props.document?.section_results[uuid]
            }

            return {};
        }

        const getComments = (uuid: string) => {
            if (props.document?.comments?.hasOwnProperty(uuid)) {
                return props.document?.comments[uuid]
            }

            return undefined;
        }

        const getBadges = (result: any, isDocument: Boolean = false, comment: String = '') => {
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
                    'group': isDocument ? `Plagiat - ${Math.floor(result.plagiat_percentage)}%` :
                        'Plagiat',
                    'positive': result.plagiat_percentage <= 40,
                })
            }

            if (result?.hasOwnProperty('cohesion')) {
                data.push({
                    'group': isDocument ? `Cohesion - ${result.cohesion.toFixed(2)}` :
                        'Cohesion',
                    'positive': result.cohesion >= 0.5,
                })
            }

            if (comment) {
                data.push({
                    'group': 'Comments',
                    'positive': false,
                })
            }

            return data
        }

        return {
            content,
            expandedKeys,
            selectedNodeKeys,
            display,
            getSectionResult,
            getBadges,
            getComments,
            selectedUuid,
            currentSectionResults,
            currentComments,
            onNodeUnselect,
            onNodeSelect,
            onHideDialog,
            getCommentUrl,
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
