<template>
    <div class="flex-col flex-nowrap">
        <prime-textarea class="grow" v-model="modelComment" :autoResize="true" rows="5" cols="60" :disabled="!isSupervisor"/>
        <prime-button v-show="isSupervisor" @click.stop="updateComment">Update</prime-button>
    </div>
</template>

<script>
import {inject, ref} from "vue"
import { Inertia } from '@inertiajs/inertia'
import {useToast} from "primevue/usetoast"

export default {
    name: "SectionCommentsComponent",
    props: {
        comment: String,
        uuid: String,
        url: String,
    },
    setup(props) {
        const modelComment = ref(props.comment)
        const isSupervisor = inject('isSupervisor')
        const toast = useToast()

        const updateComment = () => {
            Inertia.post(props.url, {comment: modelComment.value})

            toast.add({severity: 'success', summary: 'Success', detail: 'Comment updated', life: 3000})
        }

        return {
            updateComment,
            isSupervisor,
            modelComment,
        }
    }
}
</script>

<style scoped>

</style>
