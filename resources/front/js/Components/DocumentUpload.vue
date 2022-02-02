<template>
    <file-upload
        :url="url"
        :name="paramName"
        :multiple="false"
        :withCredentials="true"
        accept="application/pdf"
        @upload="onUpload"
        mode="basic"
        @before-send="onBeforeSend"
        @error="onError"
        :maxFileSize="maxFileSize"
    >
        <template #empty>
            <p>Drag and drop files to here to upload.</p>
        </template>
    </file-upload>
</template>

<script>
import {useToast} from "primevue/usetoast"
import {computed, ref} from 'vue'
import {useStore} from "vuex";
import { Inertia } from '@inertiajs/inertia'

export default {
    name: "DocumentUpload",
    props: {
        uuid: {
            type: String,
            required: true,
        },
    },
    setup(props) {
        const toast = useToast()
        const store = useStore()
        const maxFileSize = computed(() => store.getters.maxFileUploadSize)

        const url = route('front.course-works.media.store', {course_work: props.uuid})
        const paramName = 'uploaded_file'

        const onUpload = () => {
            toast.add({severity: 'success', summary: 'Success', detail: 'File Uploaded', life: 3000})

            setTimeout(() => {
                Inertia.reload()
            }, 1000)
        }

        const onBeforeSend = ({xhr}) => {
            xhr.setRequestHeader('Accept', 'application/json')
        }

        const onError = ({xhr}) => {
            let response = JSON.parse(xhr.response)

            toast.add({
                severity: 'error',
                summary: 'Error occurred',
                detail: response.errors.uploaded_file[0],
                life: 3000
            })
        }

        return {
            maxFileSize,
            url,
            paramName,
            onUpload,
            onError,
            onBeforeSend,
        }
    }
}
</script>

<style scoped>
</style>
