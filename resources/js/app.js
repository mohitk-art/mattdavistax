import Vue from 'vue';
import HelloWorldComponent from './components/HelloWorldComponent';
const app = new Vue({
el: '#appDemo',
render: h => h(HelloWorldComponent)
});
