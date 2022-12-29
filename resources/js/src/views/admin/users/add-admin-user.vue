<template>
<teleport to="#breadcrumb">
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Employee</span></li>
                            </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </teleport>
    <div class="container-fluid px-4">
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> Add Employee </p>
        </div>
        <form class="text-start" @submit="this.addUSer" autocomplete="off">
            <div class="row mt-2">

                <!-- Accoout Info -->
                <div class="col">
                    <div class="mb-4">
                        <p class="fs-6 fw-bold"> Account Information </p>
                    </div>

                    <div class="d-flex flex-column" style="width: 100%">
                        <!-- row 1 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group" style="width: 100%">
                                <label for="" class="fs-7"> Firstname <code>*</code> </label>
                                <input v-model="user.fname" name="fname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="Firstname" :class="[this.is_submit_add_admin_user_form ? (user.fname ? 'is-valid' : 'is-invalid') : '']"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the First Name</div>
                            </div>

                            <div class="form-group" style="width: 100%">
                                <label for="" class="fs-7"> Lastname <code>*</code> </label>
                                <input v-model="user.lname" name="lname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="Lastname" :class="[this.is_submit_add_admin_user_form ? (user.lname ? 'is-valid' : 'is-invalid') : '']"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Last Name</div>
                            </div>
                        </div>

                        <!-- row 2 -->
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group" style="width: 100%">
                                <label for="" class="fs-7"> Email <code>*</code></label>
                                <input autocomplete="off" v-model="user.email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" :class="[this.is_submit_add_admin_user_form ? (user.email && this.email_validate(user.email) ? 'is-valid' : 'is-invalid') : '']"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Email</div>
                            </div>

                            <div class="form-group" style="width: 100%">
                                <label for="" class="fs-7"> Contact Number <code>*</code></label>
                                <input v-model="user.contact_number" name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone" :class="[this.is_submit_add_admin_user_form ? (user.contact_number ? 'is-valid' : 'is-invalid') : '']"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Contact Number</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Password <code>*</code></label>
                                <div class="input-group">
                                    <input autocomplete="new-password" :type="this.pwd_type" v-model="user.password"  name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_admin_user_form ? (user.password ? 'is-valid' : 'is-invalid') : '']"/>
                                    <span class="input-group-text" @click="this.set_pwd_type" role="button" id="basic-addon1">
                                        <i class="far fa-eye"></i>
                                    </span>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please fill the Password</div>
                                </div>
                            </div>
                        </div>

                        <!-- row 3 -->
                        <div class="d-flex justify-content-between">
                            <div class="form-group flex-fill">
                                <label for="" class="fs-7"> Password Confirmation <code>*</code></label>
                                <div class="input-group mb-4">
                                    <input :type="this.pwd_type2" v-model="user.password_confirmation"  name="password_confirmation"  class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_admin_user_form ? (user.password_confirmation && this.password_validate() ? 'is-valid' : 'is-invalid') : '']"/>
                                    <span class="input-group-text" @click="this.set_pwd_type2" role="button" id="basic-addon1">
                                        <i class="far fa-eye"></i>
                                    </span>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please fill the Password Confirmation</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col">
                    <div class="mb-4">
                        <p class="fs-6 fw-bold"> Roles & Permissions </p>
                    </div>

                    <div class="d-flex flex-column" style="width: 100%">
                        <div class="d-flex justify-content-between gap-2">
                            <div id="select_menu" class="form-group" style="width: 100%">
                                <label for="" class="fs-7"> Roles <code>*</code></label>
                                <!-- <Multiselect
                                v-cloak
                                v-model="user.role"
                                placeholder="Select your character"
                                label="name"
                                trackBy="name"
                                :options="options"
                                :class="[this.is_submit_add_admin_user_form ? (user.password_confirmation ? 'is-valid' : 'is-invalid') : '']"
                                >
                                </Multiselect> -->
                                <select v-model="user.role" class="form-select" :class="[is_submit_add_admin_user_form ? (user.role ? 'is-valid' : 'is-invalid') : '']">
                                    <option value="">Please select Role & Permissions</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="employee">Employee</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select Role</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between gap-2">
                        </div>
                    </div>



                </div>

                <div class="col-12">
                    <button type="button" class="btn btn-outline-primary rounded-pill mb-2" @click="this.addUser">Submit
                    </button>
                </div>
            </div>
        </form>


    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import storeUser from "../../../store/admin/user";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';
    import Multiselect from '@vueform/multiselect'
    useMeta({ title: 'Add Admin User' });
</script>
<script>

    export default {
        components: { Multiselect },
        data () {
            return {
                router: useRouter(),
                value: null,
                options: [
                    {'value': 'administrator', 'name': 'Administrator'},
                    {'value': 'employee', 'name': 'Employee'},
                ],
                user:{
                    fname: '',
                    lname: '',
                    email: '',
                    contact_number: '',
                    password: '',
                    password_confirmation: '',
                    role: '',
                    company_id: 0,
                },
                is_submit_add_admin_user_form : ref(false),
                pwd_type : ref('password'),
                pwd_type2 : ref('password')
            }
        },
        methods: {
            addUser(ev) {
                ev.preventDefault();

                this.is_submit_add_admin_user_form = true;

                if (this.user.fname && this.user.lname && this.user.email && this.user.contact_number && this.user.password && this.user.password_confirmation && this.user.role) {
                    //form validated success
                    if (this.email_validate(this.user.email)) {

                        if(this.user.password != this.user.password_confirmation){
                            this.showMessage('Password Mismatched!','error')
                        }else{
                            storeUser
                            .dispatch("storeUser", this.user)
                            .then((res) => {
                                console.log(res.status);
                                if(res.status == 201 || res.status == '201'){
                                    const toast = window.Swal.mixin({
                                        toast: true,
                                        position: 'top-center',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        padding: '2em',
                                    });
                                    toast.fire({
                                        icon: 'success',
                                        title: "Employee is now successfully added!",
                                        padding: '2em',
                                    });

                                    setTimeout(() => {
                                        this.router.push({
                                            name: "admin-users",
                                        });
                                    }, 2000)

                                }
                            })
                            .catch((err) => {

                            });
                        }
                        //form validated success

                    }else{
                        this.showMessage('Email format is Invalid.','error')
                    }

                }else{
                    this.showMessage('Please fill required fields.','error')
                }


            },
            showMessage (msg = '', type = 'error') {
                const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
                toast.fire({ icon: type, title: msg, padding: '10px 20px' });
            },
            email_validate(email) {
                const regexp = /^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$/;
                return regexp.test(email);
            },
            password_validate() {
                if(this.user.password == this.user.password_confirmation){
                    return true;
                }else{
                    return false;
                }
            },
            set_pwd_type() {
                if (this.pwd_type === 'password') {
                    this.pwd_type = 'text';
                } else {
                    this.pwd_type = 'password';
                }
            },
            set_pwd_type2() {
                if (this.pwd_type2 === 'password') {
                    this.pwd_type2 = 'text';
                } else {
                    this.pwd_type2 = 'password';
                }
            }
        },
        mounted(){
            var element = document.getElementById("admin-user-id");
            element.classList.add("active");
        },
        created: function(){

        }
    }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

