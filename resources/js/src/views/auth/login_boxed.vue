<template>
    <div class="form auth-boxed">
        <div class="form-container outer">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1 class="">Sign In</h1>
                            <p class="">Log in to your account to continue.</p>
                            <form class="text-start" @submit="login">
                                <div class="form">
                                    <div id="email-field" class="field-wrapper input">
                                        <label for="email">Email</label>
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
                                            class="feather feather-user"
                                        >
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <input type="text" v-model="user.email" name="email" class="form-control" placeholder="e.g John_Doe" />
                                    </div>

                                    <div id="password-field" class="field-wrapper input mb-2">
                                        <div class="d-flex justify-content-between">
                                            <label for="password">PASSWORD</label>
                                            <router-link to="/auth/pass-recovery-boxed" class="forgot-pass-link">Forgot Password?</router-link>
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
                                        >
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input :type="pwd_type" v-model="user.password"  name="password"  class="form-control" placeholder="Password" />
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
                                            <button type="submit" class="btn btn-primary">Log In</button>
                                        </div>
                                    </div>
                                    <!-- <p class="signup-link">Not registered ? <router-link to="/auth/register-boxed">Create an account</router-link></p> -->
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
    import store from "../../store";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Login Boxed' });
    const router = useRouter();

    const user = {
        email: '',
        password: '',
    };

    const pwd_type = ref('password');

    const set_pwd_type = () => {
        if (pwd_type.value === 'password') {
            pwd_type.value = 'text';
        } else {
            pwd_type.value = 'password';
        }
    };
    let loading = ref(false);
    let errorMsg = ref("");


    function showMessage (msg = '', type = 'error') {
        const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
        toast.fire({ icon: type, title: msg, padding: '10px 20px' });
    }

    function login(ev) {
        ev.preventDefault();

        loading.value = true;
        store
            .dispatch("login", user)
            .then(() => {
            loading.value = false;
            
            console.log("store");
            console.log(store);
            console.log(store.state.user.data.roles[0].id);
            switch (store.state.user.data.roles[0].id) {
                default:
                return "Nothing";
                case 1:
                    router.push({
                        name: "Admin",
                    });
                    return;
                case 2:
                    router.push({
                        name: "Admin",
                    });
                    return;
                case 3:
                    router.push({
                        name: "Admin",
                    });
                    return;
                case 4:
                    router.push({
                        name: "Client",
                    });
                    return;
                case 5:
                    router.push({
                        name: "Client",
                    });
                    return;
            }

            })
            .catch((err) => {
                loading.value = false;
                console.log(err.response.data.message);
                showMessage(err.response.data.message,'error');
                // errorMsg.value = err.response.data.error;
            });
        }
</script>
