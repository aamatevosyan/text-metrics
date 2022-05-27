<template>
    <div class="flex-col flex-nowrap place-content-center">
        <div>
            <prime-textarea class="grow" v-model="modelComment" :autoResize="true" rows="5" cols="60"
                            :disabled="!isSupervisor"/>
        </div>
        <prime-button class="m-4 float-righ" v-show="isSupervisor" @click.stop="updateComment">Update</prime-button>
    </div>
</template>

<script>
import {inject, ref} from "vue"
import {Inertia} from '@inertiajs/inertia'
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
