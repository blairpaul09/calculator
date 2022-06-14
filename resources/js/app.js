/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: () => ({
        data: {
            operation: null,
            numbers: [],
        },
        display: "",
    }),
    watch:{
        data:{
            handler(value){
                let numbers = value.numbers;

                if(numbers.length == 2){
                    this.display = `${numbers[0]} ${this.data.operation} ${numbers[1]}`
                    return
                }else if(numbers.length == 1){
                    this.display = `${numbers[0]}  ${this.data.operation || ''}`
                } else{
                    this.display = ""
                }
            },
            deep: true
        }
    },
    methods:{
        calculate(){
            axios.post('/api/calculate', this.data).then(res => {
               const response = res.data
               this.display = response.data
               this.data.numbers = [response.data]
               this.data.operation = null
            });
        },

        setOperation(operation){
            if(this.data.numbers.length > 0){
                this.data.operation = operation;
            }
        },

        setNumbers(number){
            this.data.numbers.push(number);
        },

        unshiftInput(){
            if(this.data.numbers.length == 1 && this.data.operation != null){
                this.data.operation = ""
            }else{
                this.data.numbers.pop();
            }
        },
        clear(){
            this.data = {
                operation: null,
                numbers: [],
            }
        }
    }
});
