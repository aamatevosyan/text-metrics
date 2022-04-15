<template>
    <div>
        <Head title="User Profile Tool"/>

        <Heading class="mb-6">User Profile Tool</Heading>

        <Card
            class="flex flex-col items-center justify-center"
            style="min-height: 300px"
        >
            <update-profile-information-form v-if="$page.props.jetstream.canUpdateProfileInformation"
                                             :user="$page.props.user"/>

            <update-password-form v-if="$page.props.jetstream.canUpdatePassword"/>

        </Card>
    </div>
</template>

<script>
import JetSectionBorder from '../components/Jetstream/SectionBorder.vue'
import UpdatePasswordForm from "../components/UpdatePasswordForm";
import UpdateProfileInformationForm from "../components/UpdateProfileInformationForm";
import {defineComponent} from "vue";

export default defineComponent({
    props: ['sessions'],

    components: {
        JetSectionBorder,
        UpdatePasswordForm,
        UpdateProfileInformationForm,
    },
})
</script>

<style>
/* Scoped Styles */
</style>
