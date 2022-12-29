import { createStore } from 'vuex';
import VuexPersistence from 'vuex-persist'
import axiosClient from "../axios";
import i18n from '../i18n';

export default new createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
        company: {
            data: {}
        },
        layout: 'app',
        is_show_sidebar: true,
        is_show_search: false,
        is_dark_mode: false,
        dark_mode: 'light',
        locale: null,
        menu_style: 'vertical',
        layout_style: 'full',
        countryList: [
            { code: 'zh', name: 'Chinese' },
            { code: 'da', name: 'Danish' },
            { code: 'en', name: 'English' },
            { code: 'fr', name: 'French' },
            { code: 'de', name: 'German' },
            { code: 'el', name: 'Greek' },
            { code: 'hu', name: 'Hungarian' },
            { code: 'it', name: 'Italian' },
            { code: 'ja', name: 'Japanese' },
            { code: 'pl', name: 'Polish' },
            { code: 'pt', name: 'Portuguese' },
            { code: 'ru', name: 'Russian' },
            { code: 'es', name: 'Spanish' },
            { code: 'sv', name: 'Swedish' },
            { code: 'tr', name: 'Turkish' },
        ],
    },
    mutations: {
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            sessionStorage.removeItem("TOKEN");
            sessionStorage.removeItem("ROLES");
            sessionStorage.removeItem("PERMISSIONS");
        },
        setUser: (state, user) => {
            state.user.data = user;
        },
        setCompany: (state, company) => {
            state.company.data = company;
        },
        setToken: (state, token) => {
            state.user.token = token;
            sessionStorage.setItem('TOKEN', token);
        },
        setRole: (state, role) => {
          sessionStorage.setItem('ROLES', role);
        },
        setPermission: (state, permission) => {
          sessionStorage.setItem('PERMISSIONS', permission);
        },
        setLayout(state, payload) {
          console.log("setLayout");
          console.log(state);
          console.log("payload");
          console.log(payload);
          sessionStorage.setItem('LAYOUT', payload);
          console.log("sessionStorage.getItem('LAYOUT')");
          console.log(sessionStorage.getItem("LAYOUT"));
          state.layout = payload;

        },
        toggleSideBar(state, value) {
            state.is_show_sidebar = value;
        },
        toggleSearch(state, value) {
            state.is_show_search = value;
        },
        toggleLocale(state, value) {
            value = value || 'en';
            i18n.global.locale = value;
            localStorage.setItem('i18n_locale', value);
            state.locale = value;
        },

        toggleDarkMode(state, value) {
            //light|dark|system
            value = value || 'light';
            localStorage.setItem('dark_mode', value);
            state.dark_mode = value;
            if (value == 'light') {
                state.is_dark_mode = false;
            } else if (value == 'dark') {
                state.is_dark_mode = true;
            } else if (value == 'system') {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    state.is_dark_mode = true;
                } else {
                    state.is_dark_mode = false;
                }
            }

            if (state.is_dark_mode) {
                document.querySelector('body').classList.add('dark');
            } else {
                document.querySelector('body').classList.remove('dark');
            }
        },

        toggleMenuStyle(state, value) {
            //horizontal|vertical|collapsible-vertical
            value = value || '';
            localStorage.setItem('menu_style', value);
            state.menu_style = value;
            if (!value || value === 'vertical') {
                state.is_show_sidebar = true;
            } else if (value === 'collapsible-vertical') {
                state.is_show_sidebar = false;
            }
        },

        toggleLayoutStyle(state, value) {
            //boxed-layout|large-boxed-layout|full
            value = value || '';
            localStorage.setItem('layout_style', value);
            state.layout_style = value;
        },
    },
    getters: {
        layout(state) {
            return state.layout;
        },
    },
    actions: {
          register({commit}, user) {
            return axiosClient.post('/register', user)
              .then((response) => {
                commit('setUser', data.user);
                commit('setToken', data.token)
                return data;
              })
          },

          login({commit}, user) {
            return axiosClient.post('/login', user)
              .then(({data}) => {
                commit('setUser', data.user);
                commit('setToken', data.token);
                commit('setPermission', JSON.stringify(data.user.permissions));
                commit('setRole', JSON.stringify(data.user.roles[0].id));
                return data;
              })
          },

          logout({commit}) {
            return axiosClient.post('/logout')
              .then(response => {
                commit('logout')
                console.log(response);
                return response;
              })
          },

          forgetPassword({commit}, data) {
            return axiosClient.post('/forgot-password', data)
              .then(response => {
                console.log(response);
                return response;
              })
          },

          resetPassword({commit}, data) {
            return axiosClient.post('/reset-the-password', data)
              .then(response => {
                commit('logout')
                console.log(response);
                return response;
              })
          },

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

          getCountries({commit}) {
            return axiosClient.get('/countries')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },

          getProductCategories({commit}) {
            return axiosClient.get('/product-categories')
            .then(res => {
              return res
            //   commit('setUser', res.data)
            })
          },

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
              commit('setCompany', res.data)
              return res
            })
            // return id;
          },


          storeUser({commit},user) {
            return axiosClient.post('/users', user)
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          },

          // getContactsByID({commit},id) {
          //   return axiosClient.get('/contacts/'+id)
          //   .then(res => {
          //     return res;
          //   //   commit('setUser', res.data)
          //   })
          // },

          getRoles({commit},id) {
            return axiosClient.get('/role-user')
            .then(res => {
              return res;
            //   commit('setUser', res.data)
            })
          }

    },
    modules: {},
    // Added in order to have a persisted behavior in store
    plugins: [new VuexPersistence().plugin]
});
