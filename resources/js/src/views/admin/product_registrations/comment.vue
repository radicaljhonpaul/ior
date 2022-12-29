<template>
    <div class="container-fluid px-4">
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> {{ this.capitalizeFirstLetter($route.params.name) }}  </p>
        </div>
        <div id="basic" class="row layout-spacing layout-top-spacing">
                    <div class="col-lg-6">
                        <div class="statbox panel box box-shadow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Add Comment</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" class="form-control" id="product_registration_id" v-model="comment.product_registration_id"/>
                                <input type="hidden" class="form-control" id="user_id" v-model="comment.user_id"/>
                                <input type="hidden" class="form-control" id="name" v-model="comment.name"/>
                                <textarea class="form-control" id="comments" v-model="comment.comments"/>

                                <!---<quill-editor v-model:value="comments" :options="options1" v-model="comment.comments"></quill-editor>-->

                                <div class="code-section-container show-code">
                                    <button type="button" class="btn btn-primary"  @click="this.addComment">Add Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="timelineBasic" class="col-lg-6 layout-spacing">
                    <div class="statbox panel box box-shadow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Comment List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="mt-container mx-auto">
                                <div class="timeline-line">
                                    <div class="item-timeline" v-for="item in this.comment_list">
                                        <p class="t-time"><small>{{ moment(item.created_at).format("l [at] HH:mm a") }}</small></p>
                                        <div class="t-dot t-dot-danger"></div>
                                        <div class="t-text">
                                            <p>{{item.comments}}</p>
                                            <p><b>{{item.fname+' '+item.lname}}</b></p>
                                            <p class="t-meta-time">{{moment(item.created_at).fromNow()}}</p>
                                        </div>
                                    </div>
                                    <!-- <div class="item-timeline">
                                        <p class="t-time">10:00</p>
                                        <div class="t-dot t-dot-primary"></div>
                                        <div class="t-text">
                                            <p>Updated Server Logs</p>
                                            <p class="t-meta-time">25 mins ago</p>
                                        </div>
                                    </div>

                                    <div class="item-timeline">
                                        <p class="t-time">17:00</p>
                                        <div class="t-dot t-dot-danger"></div>
                                        <div class="t-text">
                                            <p>Collected documents from <a href="javascript:void(0);">Sara</a></p>
                                            <p class="t-meta-time">9 hrs ago</p>
                                        </div>
                                    </div>

                                    <div class="item-timeline">
                                        <p class="t-time">16:00</p>
                                        <div class="t-dot t-dot-dark"></div>
                                        <div class="t-text">
                                            <p>Server rebooted successfully</p>
                                            <p class="t-meta-time">8 hrs ago</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
    </div>
</template>
<style>
    .ql-toolbar.ql-snow .ql-picker-label {
        border: 1px solid transparent;
        color: #4361ee;
    }
    .ql-snow .ql-stroke {
        fill: none;
        stroke: #4361ee;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-width: 2;
    }
    .ql-snow .ql-fill,
    .ql-snow .ql-stroke.ql-fill {
        fill: #4361ee;
    }
    .ql-toolbar.ql-snow {
        border: 1px solid #bfc9d4;
        box-sizing: border-box;
        font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
        padding: 8px;
        border-radius: 6px;
    }
    .ql-container.ql-snow {
        border-top: 0px;
        margin-top: 10px;
        padding: 13px 0;
        border: 1px solid #bfc9d4 !important;
        border-radius: 6px;
    }
</style>

<script setup>


    import { onMounted, ref } from 'vue';
    import { useRouter } from "vue-router";
    import { quillEditor } from 'vue3-quill';
    import 'vue3-quill/lib/vue3-quill.css';
    import '@/assets/sass/components/timeline/custom-timeline.scss';
    import '@/assets/sass/scrollspyNav.scss';
    import store from "../../../store";
    import storeProducts from "../../../store/admin/product_registration";
    import { useMeta } from '@/composables/use-meta';

    useMeta({ title: 'Comment' });

    const code_arr = ref([]);

    const options1 = ref({
        modules: {
            toolbar: [[{ header: [1, 2, false] }], ['bold', 'italic', 'underline'], ['image', 'code-block']],
        },
    });
    const options2 = ref({
        modules: {
            // toolbar: '#toolbar',
            toolbar: [['bold', 'italic', 'underline', 'image', 'code-block']],
        },
    });

    onMounted(() => {
        initTooltip();
    });

    const toggleCode = (name) => {
        if (code_arr.value.includes(name)) {
            code_arr.value = code_arr.value.filter((d) => d != name);
        } else {
            code_arr.value.push(name);
        }
    };

    const initTooltip = () => {
        setTimeout(() => {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map((tooltipTriggerEl) => {
                return new window.bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    };



</script>

<script>
    import moment from 'moment';

    export default {
    data () {
        return {
            router: useRouter(),
            comment:{
                user_id: '',
                product_registration_id: '',
                comments: '',
            },
            comment_list : ref({}),
            moment: moment

        }
    },
    mounted() {
            const router = useRouter();
        },
    methods: {
        addComment(ev) {
            ev.preventDefault();
            storeProducts
                .dispatch("addComment", this.comment)
                .then((res) => {
                    this.comment.comments = null;
                    const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            padding: '2em',
                        });
                        toast.fire({
                            icon: 'success',
                            title: "Comments Added",
                            padding: '2em',
                        });
                    this.bindCommentsData()
                })
                .catch((err) => {

                });
        },
        capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
        },
        bindCommentsData(){
            storeProducts.dispatch("getCommentsById",this.$route.params.id)
            .then((res) => {
                this.comment_list = res.data
                // this.comment.name = res.data.fname + ' ' + res.data.lname
                console.log("list",this.comment_list.value)
            })
        }

    },
    created: function(){
      store.dispatch("getUser")
        .then((res) => {
            this.comment.user_id = res.data.id
            this.comment.product_registration_id = this.$route.params.id
            // this.comment.name = res.data.fname + ' ' + res.data.lname
        })

        // storeProducts.dispatch("getCommentsById",this.$route.params.id)
        // .then((res) => {
        //     this.comment_list = res.data
        //     // this.comment.name = res.data.fname + ' ' + res.data.lname
        //     console.log("list",this.comment_list.value)
        // })
        this.bindCommentsData();
        this.moment = moment;
        this.$watch(
          () => this.$route.params,
          (toParams, previousParams) => {
            this.bindCommentsData()
          }
        )
    }
    }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

