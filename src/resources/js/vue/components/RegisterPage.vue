<template>
    <div class="flex flex-col pt-3 lg:pt-8">
        <template v-if="errors">
            <div class="flex justify-center pt-5">
                <div class="w-full py-3 px-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200"
                    role="alert">
                    <span v-html="errors"></span>
                </div>
            </div>
        </template>
        <Form
            :validation-schema="schema"
            @submit="submit"
        >
            <div class="flex flex-col pt-4">
                <label for="email" class="text-lg">Email</label>
                <Field name="email" v-model="email" placeholder="enter your email address" class="shadow appearance-none border rounded w-full py-2 px-3 text-rich-black mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                <ErrorMessage name="email" class="text-laravel-red ml-4" />
            </div>

            <div class="flex flex-col pt-4">
                <label for="name" class="text-lg">Name</label>
                <Field name="name" v-model="name" placeholder="enter your name" class="shadow appearance-none border rounded w-full py-2 px-3 text-rich-black mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                <ErrorMessage name="name" class="text-laravel-red ml-4" />
            </div>

            <div class="flex flex-col pt-4">
                <label for="password" class="text-lg">Password</label>
                <Field name="password" v-model="password" placeholder="enter password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-rich-black mt-1 leading-tight focus:outline-none focus:shadow-outline">
                </Field>
                <ErrorMessage name="password" class="text-laravel-red ml-4" />
            </div>

            <div class="flex flex-col pt-4">
                <label for="passwordConfirm" class="text-lg">Password Confirm</label>
                <Field name="passwordConfirm" v-model="passwordConfirm" placeholder="confirm password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-rich-black mt-1 leading-tight focus:outline-none focus:shadow-outline">
                </Field>
                <ErrorMessage name="passwordConfirm" class="text-laravel-red ml-4" />
            </div>

            <div class="flex flex-col pt-4">
                <Field v-slot="{ field }" name="terms" type="checkbox" :value="false">
                    <label class="text-center">
                        <input type="checkbox" name="terms" v-bind="field" :value="false" />
                        I Agree to 
                        <span class="block md:inline">
                            <a href="/terms-of-service" target="_blank" class="font-bold text-laravel-red">Terms of Service</a> 
                            and 
                            <a href="/privacy-policy" target="_blank" class="font-bold text-laravel-red">Privacy Policy</a>
                        </span>
                    </label>
                </Field>
                <ErrorMessage name="terms" class="text-laravel-red text-center" />
            </div>

            <button
                class="submit bg-laravel-red text-white font-bold text-lg hover:bg-laravel-red-lighter p-2 mt-8 w-full rounded"
                :class="{ 'animate-pulse': preventPress }"
                :disabled="preventPress"
            >
                Register
            </button>
        </Form>
        <loading-overlay :is-loading="preventPress" />
    </div>
</template>

<script>
import LoadingOverlay from "./parts/LoadingOverlay.vue";
import { Field, Form, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
    components: {
        LoadingOverlay,
        Field,
        Form,
        ErrorMessage,
    },
    props: {
        registerUrl: {
            type: String,
            required: true,
        },
    },
    data() {
        const schema = yup.object({
            email: yup.string().required().email(),
            name: yup.string().required(),
            password: yup.string().required().min(8),
            passwordConfirm: yup.string().required().is([yup.ref('password')], 'this field must match with password filed'),
            terms: yup.boolean().required('please check this box if you want to proceed.'),
        });
        return {
            schema,
            preventPress: false,
            email: "",
            name: "",
            password: "",
            passwordConfirm: "",
            errors: null,
        }
    },
    methods: {
        async submit() {
            this.preventPress = true;
            this.errors = null;
            const params = {
                'email': this.email,
                'name': this.name,
                'password': this.password,
            }
            await axios
                .post(this.registerUrl, params)
                .then((response) => {
                    window.location.href = response.data.redirect_url;
                })
                .catch((errors) => {
                    this.setErrorMessage(errors.response.data.errors)        
                    this.preventPress = false;
                });
        },
        setErrorMessage(errorMessages) {
            if (typeof(errorMessages) == 'object') {
                Object.values(errorMessages).forEach(m => {
                    if (!this.errors) {
                        this.errors = m[0];
                    } else {
                        this.errors += ('<br>' + m[0]);
                    }
                });
            } else {
                this.errors = errorMessages;
            }
        }
    },
}
</script>