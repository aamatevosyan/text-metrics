<template>
    <div>
        <Head title="User Profile Tool"/>

        <Heading class="mb-6">User Profile Tool</Heading>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <update-profile-information-form :user="$page.props.user"/>

                    <jet-section-border/>
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <update-password-form class="mt-10 sm:mt-0"/>

                    <jet-section-border/>
                </div>
            </div>
        </div>

<!--        <Card-->
<!--            class="flex flex-col items-center justify-center"-->
<!--            style="min-height: 300px"-->
<!--        >-->

<!--            <update-profile-information-form v-if="$page.props.jetstream.canUpdateProfileInformation"-->
<!--                                             :user="$page.props.user"/>-->

<!--            <update-password-form v-if="$page.props.jetstream.canUpdatePassword"/>-->

<!--        </Card>-->
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
