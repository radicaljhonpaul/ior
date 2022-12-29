<template>
    <div class="container-fluid px-4">
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> Create User </p>
            <i class="fas fa-user"></i>
        </div>
        <form class="text-start" @submit="addCompany">
            <div class="row mt-2">
                <div class="col">
                    <div class="mb-4">
                        <p class="fs-6 fw-bold"> Primary Contact Person </p>
                    </div>
                    
                    <div class="d-flex flex-column">
                        <!-- row 1 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group">
                                <label for="" class="fs-7"> Firstname </label>
                                <input v-model="user.fname" name="fname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="Firstname" />
                            </div>

                            <div class="form-group">
                                <label for="" class="fs-7"> Lastname </label>
                                <input v-model="user.lname" name="lname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="Lastname" />
                            </div>
                        </div>

                        <!-- row 2 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group">
                                <label for="" class="fs-7"> Email </label>
                                <input v-model="user.email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" />
                            </div>

                            <div class="form-group">
                                <label for="" class="fs-7"> Contact Number </label>
                                <input v-model="user.contact_number" name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Password </label>
                                <div class="input-group">
                                    <input :type="pwd_type" v-model="user.password"  name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" />
                                    <span class="input-group-text" @click="set_pwd_type" role="button" id="basic-addon1">
                                        <i class="feather feather-eye"></i>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <!-- row 3 -->
                        <div class="d-flex justify-content-between">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Password Confirmation </label>
                                <div class="input-group mb-4">
                                    <input :type="pwd_type2" v-model="user.password_confirmation"  name="password_confirmation"  class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="Password" />
                                    <span class="input-group-text" @click="set_pwd_type2" role="button" id="basic-addon1">
                                        <i class="feather feather-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                

                <div class="col">
                    <div class="mb-4">
                        <p class="fs-6 fw-bold"> Sales Company </p>
                    </div>
                    
                    <div class="d-flex flex-column">

                        <!-- row 1 -->
                        <div class="d-flex justify-content-between">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Company Name </label>
                                <input v-model="company.company_name" type="text" class="form-control" placeholder="Company Name" aria-label="Company Name" aria-describedby="Company Name" />
                            </div>
                        </div>

                        <!-- row 2 -->
                        <div class="d-flex justify-content-between">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Company Address </label>
                                <input v-model="company.company_address" type="text" class="form-control" placeholder="Company Address" aria-label="Company Address" aria-describedby="Company Address" />
                            </div>
                        </div>

                        <!-- row 3 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group">
                                <label for="" class="fs-7"> City </label>
                                <input v-model="company.city" type="text" class="form-control" placeholder="City" aria-label="City" aria-describedby="City" />
                            </div>

                            <div class="form-group w-100">
                                <label for="" class="fs-7"> Country </label>
                                <multiselect style="width:100%;" v-model="company.country" :options="options2" :searchable="true" :preselect-first="true" selected-label="" select-label="" deselect-label="" placeholder="Select a Country"></multiselect>
                                <!-- <multiselect v-model="inputs['input1']" :options="options1" :searchable="true" :preselect-first="true" selected-label="" select-label="" deselect-label="" placeholder="Select a Country"></multiselect> -->
                            </div>
                        </div>

                        <!-- row 4 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group">
                                <label for="" class="fs-7"> Zipcode </label>
                                <input v-model="company.zip" type="text" class="form-control" placeholder="Zipcode" aria-label="Zipcode" aria-describedby="Zipcode" />
                            </div>

                            <div class="form-group">
                                <label for="" class="fs-7"> Business License No. </label>
                                <input v-model="company.business_license" type="text" class="form-control" placeholder="Business License No." aria-label="Business License No." aria-describedby="Business License No." />
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary rounded-pill mb-2">Submit <i class="far fa-address-book"></i> </button>
                </div>
            </div>
        </form>

        
    </div>
</template>

<script setup>
    import { onMounted ,ref } from 'vue';
    
    import highlight from '@/components/plugins/highlight.vue';
    import store from "../../../store";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';
    
    useMeta({ title: 'Add User' });

    const router = useRouter();

    // const user = {
    //     fname: '',
    //     lname: '',
    //     email: '',
    //     contact_number: '',
    //     password: '',
    //     password_confirmation: '',
    //     user_role_id: 2,
    //     company_id: '',
    // };

    // const company = {
    //     company_name : '',
    //     company_address : '',
    //     city : '',
    //     country : null,
    //     zip : '',
    //     business_license : '',
    // }

    const pwd_type = ref('password');
    const pwd_type2 = ref('password');

    const set_pwd_type = () => {
        if (pwd_type.value === 'password') {
            pwd_type.value = 'text';
        } else {
            pwd_type.value = 'password';
        }
    };

    const set_pwd_type2 = () => {
        if (pwd_type2.value === 'password') {
            pwd_type2.value = 'text';
        } else {
            pwd_type2.value = 'password';
        }
    };

    // onMounted(() => {
    //     bind_data();
    //     console.log(options2);
    //     // options2.obj.map(function (e) {
    //     //     // return e;
    //     //     console.log(e);
    //     // });

    //     // options2.forEach(element => {
    //     //     console.log(element);
    //     // });
    // });

    // const bind_data = () => {
        // store.dispatch("getCountries")
        // .then((res) => {
        //     // console.log(res);
        //     options2.value = res.data;

        //     // res.data.forEach(element => {
        //     //     console.log(element);
        //     //     options2.push(element);
        //     // });
        // })
    // };

    // function addCompany(ev) {
    //     ev.preventDefault();
    //     // console.log(company)
    //     store
    //         .dispatch("storeCompany", company)
    //         .then((res) => {
    //         // loading.value = false;
    //             user.company_id = res.id;
    //             addUser(user);

    //         })
    //         .catch((err) => {
    //         // loading.value = false;
    //         // errorMsg.value = err.response.data.error;
    //         });
    // }

    // function addUser(user) {
    //     // ev.preventDefault();
    //     alert('asd')
    //     console.log(user)
    //     store
    //         .dispatch("storeUser", user)
    //         .then((res) => {
    //         // loading.value = false;
            
    //             console.log(res)

    //         })
    //         .catch((err) => {
    //         // loading.value = false;
    //         // errorMsg.value = err.response.data.error;
    //         });
    // }


</script>

<script>
    import Multiselect from '@suadelabs/vue3-multiselect';
    import '@/assets/sass/scrollspyNav.scss';
    import '@/assets/sass/authentication/auth-boxed.scss';
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    export default {
    components: { Multiselect },
    data () {
        return {
            selected: null,
            options2: [],
            user : {
                fname: '',
                lname: '',
                email: '',
                contact_number: '',
                password: '',
                password_confirmation: '',
                user_role_id: 2,
                company_id: '',
                is_primary_contact: 0,
            },
            company : {
                company_name : '',
                company_address : '',
                city : '',
                country : null,
                zip : '',
                business_license : '',
            }
        }
    },
    methods: {
        addCompany(ev) {
            ev.preventDefault();
            // console.log(company)
            store
                .dispatch("storeCompany", company)
                .then((res) => {
                // loading.value = false;
                    user.company_id = res.id;
                    this.addUser(user);

                })
                .catch((err) => {
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
        },
        addUser(user) {
            // ev.preventDefault();
            alert('asd')
            console.log(user)
            store
                .dispatch("storeUser", user)
                .then((res) => {
                // loading.value = false;
                
                    console.log(res)

                })
                .catch((err) => {
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
        }
    },
    created: function(){
        console.log('dsds');
        store.dispatch("getCountries")
        .then((res) => {
            alert(res);
            this.options2.value = res.data;

            // res.data.forEach(element => {
            //     console.log(element);
            //     options2.push(element);
            // });
        })
    }
    }
</script>