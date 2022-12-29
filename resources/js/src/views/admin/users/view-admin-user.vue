<template>
    <div class="layout-px-spacing app-contacts">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>View Employee</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>

        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="inv--head-section inv--detail-section">
                <div class="row">

                    <div class="user-profile layout-spacing">
                    <div class="panel" style="width:100%;">
                        <div class="panel-body">
                            <div class="d-flex justify-content-between">

                            </div>
                            <div class="text-center user-info">

                                 <input name="photos" ref="fl_profile" type="file" class="d-none" accept="image/*" @change="this.change_file" />
                                 <img
                                    :src="selected_file ? selected_file : user.avatar ? '/storage/user_avatar/'+user.id+'/'+user.avatar : 'https://ui-avatars.com/api/?name='+ user.fname + '+' + user.lname"
                                    alt="profile"
                                    class="profile-preview"
                                    @click="$refs.fl_profile.click()"
                                />
                                <p class="">{{user.fname +' '+user.lname}}</p>
                            </div>
                            <div class="user-info-list">
                                <div class="">
                                    <ul class="contacts-block list-unstyled">
                                        <li class="contacts-block__item">
                                            <a href="#"
                                                ><svg
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
                                            </svg>{{user_role_id.toUpperCase()}}</a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <a href="mailto:example@mail.com"
                                                ><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-mail"
                                                >
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline></svg>{{user.email}}</a>
                                        </li>
                                        <li class="contacts-block__item">
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
                                                class="feather feather-phone"
                                            >
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                ></path>
                                            </svg>
                                            {{user.contact_number}}
                                        </li>
                                        <li class="contacts-block__item">
                                            <p>
                                                <button @click="isOpen = !isOpen" type="button" class="btn btn-dark btn-lg mb-4 me-2">Change Password
                                                </button>
                                                <!-- <a href="javascript:;" id="settingbutton" class="setting" @click="isOpen = !isOpen">test</a> -->
                                            </p>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="updatePasswordModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content mailbox-popup">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="updatePasswordModalTitle">
                                <div class="row">
                                    <div class="col">


                                        <div class="d-flex flex-column">
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
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" @click="save_user()">Update</button>
                </div>
            </div>
        </div>
        </div>
        <div>
        <div class="overlay-setting" :class="{ show: isOpen }" @click="isOpen = !isOpen"></div>

        <div class="app-settings" :class="{ active: isOpen }">

            <perfect-scrollbar class="sidbarchat p-3 sidbarchat2" tag="div">
                <a class="btn-close" href="javascript:;" @click="isOpen = !isOpen"> </a>

                <h5 class="mb-0 text-center">Change Password</h5>
                <hr />

                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-between gap-2">
                                <div class="form-group flex-fill">
                                    <label for="" class="fs-7"> Current Password </label>
                                    <div class="input-group">
                                        <input :type="pwd_type" v-model="password.current_password"  name="password"  class="form-control" placeholder="Current Password" aria-label="Current Password" aria-describedby="Current Password" />
                                        <span class="input-group-text" @click="set_pwd_type" role="button" id="">
                                            <i class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between gap-2">
                                <div class="form-group flex-fill">
                                    <label for="" class="fs-7"> New Password </label>
                                    <div class="input-group">
                                        <input :type="pwd_type2" v-model="password.password"  name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" />
                                        <span class="input-group-text" @click="set_pwd_type2" role="button" id="">
                                            <i class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- row 3 -->
                            <div class="d-flex justify-content-between">
                                <div class="form-group flex-fill">
                                    <label for="" class="fs-7"> Password Confirmation </label>
                                    <div class="input-group mb-4">
                                        <input :type="pwd_type3" v-model="password.password_confirmation"  name="password_confirmation"  class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="Password" />
                                        <span class="input-group-text" @click="set_pwd_type3" role="button" id="">
                                            <i class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" @click="changePassword()">Update</button>
                </div>
            </perfect-scrollbar>
        </div>
    </div>
</template>
<style scoped>
    .searchable-container .switch {
        width: auto;
        height: auto;
    }
    .searchable-container .searchable-items.grid .items .user-profile .custom-checkbox {
        display: none !important;
    }
</style>

<script setup>
    import { onMounted, ref } from 'vue';
    import '@/assets/sass/apps/contacts.scss';
    import '@/assets/sass/users/user-profile.scss';
    import '@/assets/sass/components/custom-sweetalert.scss';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import store from "../../../store/index";
    import storeUser from "../../../store/admin/user";
    import { useMeta } from '@/composables/use-meta';
    import { useRouter } from "vue-router";

    useMeta({ title: 'Admin User Info' });

    const router = useRouter();

    let updatePasswordModal = ref(null);
    const params = ref({ id: null, name: '', email: '', role: '', phone: '', location: '' });
    const contacts_list = ref([]);
    const filterd_contacts_list = ref([]);
    const user = ref({
        fname: '',
        lname: '',
        email: '',
        contact_number: '',
        password: '',
        password_confirmation: '',
        // user_role_id: '',
        role: 'secondary_client',
        company_id: router.currentRoute.value.params.id,
        // is_primary_contact: 0,
    });
    const user_role_id = ref('');
    const search_user = ref('');




    onMounted(() => {
        initPopup();

        bind_user();
        // bind_contacts();
    });



    const initPopup = () => {
        updatePasswordModal = new window.bootstrap.Modal(document.getElementById('updatePasswordModal'));
    };

    const bind_contacts = () => {
        storeUser.dispatch("getContactsByID",router.currentRoute.value.params.id)
            .then((res) => {
                    console.log("getContactsByID")  ;
                    console.log(res);
                    // console.log(res.data.length)
                    contacts_list.value = res.data;
                    search_contacts();
                })
            .catch((err) => {
                console.log(err)
            // loading.value = false;
            // errorMsg.value = err.response.data.error;
        });

    };

    const bind_user = () => {
        storeUser
            .dispatch("getAdminUser", router.currentRoute.value.params.id)
            .then((res) => {
            // loading.value = false;
                user_role_id.value = res.data.roles[0].name;
                user.value = res.data;

            })
            .catch((err) => {
            // loading.value = false;
            // errorMsg.value = err.response.data.error;
            });
    };
    const search_contacts = () => {
        filterd_contacts_list.value = contacts_list.value.filter((d) => d.name.toLowerCase().includes(search_user.value));
    };

    const pwd_type = ref('password');
    const pwd_type2 = ref('password');
    const pwd_type3 = ref('password');
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
    const set_pwd_type3 = () => {
        if (pwd_type3.value === 'password') {
            pwd_type3.value = 'text';
        } else {
            pwd_type3.value = 'password';
        }
    };
    function addUser(user) {
        // ev.preventDefault();
        console.log(user)
        store
            .dispatch("storeUser", user)
            .then((res) => {
            // loading.value = false;

                // window.location.reload()
                bind_contacts();
            })
            .catch((err) => {
            // loading.value = false;
            // errorMsg.value = err.response.data.error;
            });
    }
</script>
<script>
    import Multiselect from '@vueform/multiselect'
    import { useRouter } from "vue-router";


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
                password:{
                    id : this.router.currentRoute.value.params,
                    current_password : '',
                    new_password : '',
                    password_confirmation : '',
                },
                isOpen : ref(null),
                selected_file : ref(this.user.avatar)

            }
        },
        methods: {
            addUser(ev) {
                ev.preventDefault();

                storeUser
                    .dispatch("storeUser", this.user)
                    .then((res) => {
                        console.log(res.status);
                        if(res.status == 201 || res.status == '201'){
                            this.router.push({
                                name: "admin-users",
                            });
                        }
                    })
                    .catch((err) => {
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                    });
            },
            edit_user(user) {
                console.log("edit_user");
                console.log(user);
                params.value = { id: null, name: '', email: '', role: '', phone: '', location: '' };
                if (user) {
                    params.value = JSON.parse(JSON.stringify(user));
                }

                updatePasswordModal.show();
            },
            changePassword() {
                // console.log(this.password)
                storeUser
                    .dispatch("storeChangePassword", this.password)
                    .then((res) => {

                        if(res == "Success"){
                            const toast = window.Swal.mixin({
                                toast: true,
                                position: 'top-center',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em',
                            });
                            toast.fire({
                                icon: 'success',
                                title: "Password updated sucessfully",
                                padding: '2em',
                            });

                            this.isOpen = !this.isOpen

                            this.password.current_password = '';
                            this.password.password = '';
                            this.password.password_confirmation = '';
                        }else{
                            const toast = window.Swal.mixin({
                                toast: true,
                                position: 'top-center',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em',
                            });
                            toast.fire({
                                icon: 'error',
                                title: res,
                                padding: '2em',
                            });
                        }



                    })
                    .catch((err) => {
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                        console.log(err.response.data.message);

                        const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            padding: '2em',
                        });
                        toast.fire({
                            icon: 'error',
                            title: err.response.data.message,
                            padding: '2em',
                        });
                    });
            },
            change_file(event){

                this.selected_file = URL.createObjectURL(event.target.files[0]);

                console.log("user",this.user.id)
                const formData = new FormData();
                formData.append('file1', event.target.files[0]);
                formData.append('id', this.user.id);
                const headers = { 'Content-Type': 'multipart/form-data' };
                storeUser
                    .dispatch("storeChangeAvatar", formData)
                    .then((res) => {
                        const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            padding: '2em',
                        });
                        toast.fire({
                            icon: 'success',
                            title: "Avatar updated successfully",
                            padding: '2em',
                        });
                    })
                    .catch((err) => {
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                    });
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
