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


          storeCompany({commit},company) {
            return axiosClient.post('/companies', company)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          getCompanies({commit}) {
            return axiosClient.get('/companies')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },

          getCompany({commit},id) {
            return axiosClient.get('/company/'+id)
            .then(res => {
            //   commit('setCompany', res.data)
              return res
            })
            // return id;
          },

          updateCompany({commit},company) {
            return axiosClient.post('/company', company)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          destroyCompany({commit},id) {
            return axiosClient.delete('/company/'+id+'/')
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          getCompanyProducts({commit}, company_id) {
            return axiosClient.get('/company/company-products/'+company_id)
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
