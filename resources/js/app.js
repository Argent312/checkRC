/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

//Componente de actividades por galas
import CheckListComponent from './components/CheckListComponent.vue';
app.component('check-list', CheckListComponent);

//Componente Administrador, para gestionar todas las actividades, acceso solo a admin
import AdmindComponent from './components/AdmindComponent.vue';
app.component('admin', AdmindComponent);

//Componente de actividades de eventos y salidas
import EventComponent from './components/EventComponent.vue';
app.component('event-list', EventComponent);

//Componente de pendientes
import PendientComponent from './components/PendientComponent.vue';
app.component('pendient-list', PendientComponent);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
