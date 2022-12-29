<template>
    <div class="form no-image-content auth-boxed">
        <div class="form-container outer">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1 class="">Password Recovery</h1>
                            <p class="signup-link recovery">Enter your email and instructions will sent to you!</p>
                            <form class="text-start">
                                <div class="form">
                                    <div id="email-field" class="field-wrapper input">
                                        <div class="d-flex justify-content-between">
                                            <label for="email">EMAIL</label>
                                        </div>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-at-sign"
                                        >
                                            <circle cx="12" cy="12" r="4"></circle>
                                            <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                        </svg>
                                        <input type="email" v-model="emailTo" class="form-control" placeholder="Email" />
                                    </div>

                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button type="button" class="btn btn-primary" @click="this.passwordReset()">Reset</button>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <router-link to="/auth/login" class="forgot-pass-link">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="18"
                                                height="18"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                            Go back to login
                                        </router-link>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import '@/assets/sass/authentication/auth-boxed.scss';
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Password Recovery Boxed' });
</script>


<script>
    import { useRouter } from "vue-router";
    import store from '../../store';

    export default {
        components: { },
        data () {
            return {
                router: useRouter(),
                emailTo: '',
            }
        },
        mounted() {
        },
        methods: {
            passwordReset() {
                console.log("emailTo");
                console.log(this.emailTo);
                store
                    .dispatch("forgetPassword", {'email' : this.emailTo})
                    .then((res) => {
                        console.log(res.status);
                        if(res.status == 200){
                            console.log(res.status);
                            Swal.fire({
                                title: 'Success',
                                text: res.data.status,
                                icon: 'success',
                                timer: 3000
                            });
                        }else{
                            Swal.fire({
                                title: 'Sorry',
                                text: 'Something wrong with the network. Please contact your IT Department.',
                                icon: 'error',
                                timer: 3000
                            });
                        }
                    })
                    .catch((err) => {
                        // console.log(err);
                        // console.log(err.response.data.message);
                        Swal.fire({
                            title: 'Sorry',
                            text: err.response.data.message,
                            icon: 'error',
                            timer: 3000
                        });
                    });
            }
        },
        created: function(){
            
        }
    }
</script>