<template>
    <Head title="Secure Area" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Head } from '@inertiajs/inertia-vue3';
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

        data() {
            return {
                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('front.password.confirm'), {
                    onFinish: () => this.form.reset(),
                })
            }
        }
    })
</script>
