import { createStore } from 'vuex';
import axiosClient from "../../axios";

export default new createStore({
    state: {
     
        
    },
    mutations: {
        
       
    },
    getters: {
        
    },
    actions: {
        getProducts({commit}) {
            return axiosClient.get('/non-regulated-products')
            .then(res => {
              return res
            })
        },
    },
    modules: {},
});
