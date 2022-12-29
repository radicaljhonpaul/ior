import { createStore } from 'vuex';
import axiosClient from "../../axios";
import VuexPersistence from 'vuex-persist'

export default new createStore({
    state: {


    },
    mutations: {


    },
    getters: {

    },
    actions: {


          addProduct({commit},product) {
            return axiosClient.post('/add-product-registration', product)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          addComment({commit},comment) {
            return axiosClient.post('/add-product-registration-comment', comment)
              .then(({data}) => {
                return data;
              })
          },

          getProdRegById({commit},id) {
            return axiosClient.get('/non-regulated-product/'+id)
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
          getProducts({commit}) {
            return axiosClient.get('/non-regulated-products')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
          bulkProductUpload({commit}, product) {
            return axiosClient.post('/product-registration-bulk-upload', product, {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            })
            .then(data => {
              return data
            //   commit('setUser', res.data)
            })
          },


          getProductsPending({commit}) {
            return axiosClient.get('/admin/non-regulated-products-pending')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
          getProductsApproved({commit}) {
            return axiosClient.get('/admin/non-regulated-products-approved')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
          getProductsDeclined({commit}) {
            return axiosClient.get('/admin/non-regulated-products-declined')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
          productRegistrationAction({commit},payload) {
            return axiosClient.post('/admin/product-registration-action',payload)
            .then(res => {
            //   commit('setCompany', res.data)
              return res
            })
            // return id;
          },

          updateProductRegistration({commit},payload) {
            return axiosClient.post('/admin/update-product-registration',payload)
            .then(res => {
            //   commit('setCompany', res.data)
              return res
            })
            // return id;
          },
          addDeclinedMessage({commit},payload) {
            return axiosClient.post('/admin/add-declined-message',payload)
            .then(res => {
            //   commit('setCompany', res.data)
              return res
            })
            // return id;
          },

          getCommentsById({commit},id) {
            return axiosClient.get('/admin/product-registration-comments/'+id)
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },
    },
    modules: {},
    // Added in order to have a persisted behavior in store
    plugins: [new VuexPersistence().plugin]
});
