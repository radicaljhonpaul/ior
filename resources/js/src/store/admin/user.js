import { createStore } from 'vuex';
import axiosClient from "../../axios";
import i18n from '../../i18n';
import VuexPersistence from 'vuex-persist'

export default new createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
    },
    mutations: {

        setUser: (state, user) => {
            state.user.data = user;
        },

    },
    getters: {

    },
    actions: {

          getUser({commit}) {
            return axiosClient.get('/user')
            .then(res => {
              // commit('setUser', res.data);
              return res;

            })
          },

          getAdminUsers({commit}) {
            return axiosClient.get('/admin-users')
            .then(res => {
              return res
              // commit('setUser', res.data)

            })
          },

          getAdminUser({commit},id) {
            return axiosClient.get('/admin-user/'+id)
            .then(res => {
              return res
              // commit('setUser', res.data)

            })
          },
          storeUser({commit},user) {
            return axiosClient.post('/users', user)
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          },
          storeCompanyUser({commit},user) {
            return axiosClient.post('/register-primary-users', user)
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          },
          updateCompanyUser({commit},user) {
            return axiosClient.post('/update-primary-users', user)
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          },
          getContactsByID({commit},id) {
            return axiosClient.get('/contacts/'+id)
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          },

          updateAdminUser({commit},user) {
            return axiosClient.post('/admin-user', user)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          destroyAdminUser({commit},id) {
            return axiosClient.delete('/admin-user/'+id+'/')
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

          storeChangePassword({commit},payload) {
            return axiosClient.post('/reset-password/',payload)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },
          storeChangeAvatar({commit},payload) {
            return axiosClient.post('/change-avatar/',payload)
              .then(({data}) => {
                // commit('setUser', data.user);
                return data;
              })
          },

    },
    modules: {},
    // Added in order to have a persisted behavior in store
    plugins: [new VuexPersistence().plugin]
});
