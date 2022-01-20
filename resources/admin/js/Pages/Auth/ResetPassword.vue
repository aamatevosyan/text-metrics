<template>
    <Head title="Reset Password"/>

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo/>
        </template>

        <jet-validation-errors class="mb-4"/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email"/>
                <jet-input id="email" v-model="form.email" autofocus class="mt-1 block w-full" required type="email"/>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password"/>
                <jet-input id="password" v-model="form.password" autocomplete="new-password" class="mt-1 block w-full" required
                           type="password"/>
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password"/>
                <jet-input id="password_confirmation" v-model="form.password_confirmation" autocomplete="new-password"
                           class="mt-1 block w-full" required type="password"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset Password
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import {defineComponent} from 'vue';
import {Head} from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@shared/Components/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@shared/Components/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@shared/Components/Jetstream/Button.vue'
import JetInput from '@shared/Components/Jetstream/Input.vue'
import JetLabel from '@shared/Components/Jetstream/Label.vue'
import JetValidationErrors from '@shared/Components/Jetstream/ValidationErrors.vue'

export default defineComponent({
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('admin.password.update'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
})
</script>
