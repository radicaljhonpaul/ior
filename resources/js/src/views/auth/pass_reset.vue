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
                                        <input type="email" v-model="user.email" class="form-control" placeholder="Email" />
                                    </div>

                                    <div id="pass-field" class="field-wrapper input">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">PASSWORD</label>
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
                                            class="feather feather-lock"
                                            data-v-5522efca="">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input :type="pwd_type" v-model="user.password" class="form-control" placeholder="Password" />
                                        <svg
                                            @click="set_pwd_type"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            id="toggle-password"
                                            class="feather feather-eye"
                                        >
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>

                                    <div id="pass-field-confirm" class="field-wrapper input">
                                        <div class="d-flex justify-content-between">
                                            <label for="confirm_password">PASSWORD CONFIRMATION</label>
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
                                            class="feather feather-lock"
                                            data-v-5522efca="">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input :type="pwd_type" v-model="user.password_confirmation" class="form-control" placeholder="Password Confirmation" />
                                        <svg
                                            @click="set_pwd_type"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            id="toggle-password"
                                            class="feather feather-eye"
                                        >
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>

                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button type="button" class="btn btn-primary" @click="this.passwordReset()">Reset</button>
                                        </div>
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

    const pwd_type = ref('password');

    const set_pwd_type = () => {
        if (pwd_type.value === 'password') {
            pwd_type.value = 'text';
        } else {
            pwd_type.value = 'password';
        }
    };
</script>

<script>
    import { useRouter } from "vue-router";
    import store from '../../store';
    
    export default {
        components: { },
        data () {
            return {
                router: useRouter(),
                user:{
                    email: '',
                    password: '',
                    password_confirmation: '',
                    token: this.getToken('token'),
                },
            }
        },
        mounted() {

        },
        methods: {
            passwordReset() {
                console.log("user");
                console.log(this.user);
                store.dispatch("resetPassword", this.user)
                    .then((res) => {
                        console.log(res);
                        console.log(res.status);
                        if(res.status == 200){
                            console.log(res);
                            Swal.fire({
                                title: 'Success',
                                text: res.data.message,
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
                        console.log(err);
                        Swal.fire({
                            title: 'Sorry',
                            text: err.response.data.message,
                            icon: 'error',
                            timer: 3000
                        });
                    });
            },
            getToken(param){
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === param) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            }
        },
        created: function(){
            
        }
    }
</script>