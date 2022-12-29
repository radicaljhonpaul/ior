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
          

          addProduct({commit},product) {
            return axiosClient.post('/add-product-registration', product)
              .then(({data}) => {
                return data;
              })
          },
         getProducts({commit}) {
            return axiosClient.get('/non-regulated-products')
            .then(res => {
              return res
            })
          },
          getProductsDetails({commit},id) {
            return axiosClient.get('/non-regulated-products-data/'+id)
            .then(res => {
              return res
            })
          },
          updateProduct({commit},product) {
            return axiosClient.post('/non-regulated-products-update',product)
            .then(res => {
              return res
            })
          },
          destroyProduct({commit},id) {
            return axiosClient.delete('/non-regulated-products-delete/'+id+'/')
              .then(({data}) => {
                return data;
              })
          },


          

    },
    modules: {},
});
