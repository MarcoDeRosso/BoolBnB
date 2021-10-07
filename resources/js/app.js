/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
});


const API_KEY = 'RagRFtF86mML8SeN6kqbSiihdZpGAE1d';
const APPLICATION_NAME = 'My Application';
const APPLICATION_VERSION = '1.0';
 
tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);

const roma = {lng: 13.36375, lat: 38.1163};

// dobbiamo utilizzare l'API https://api.tomtom.com/search/2/geocode/via%20roma%2C%20palermo.json?limit=1&lat=37.337&lon=-121.89&key=RagRFtF86mML8SeN6kqbSiihdZpGAE1d
// dove il campo inserito dall'utente sarà quello dopo il geocode ovvero in questo caso via roma palermo
//questa chiamata ci restituirà il valolore di latitudine e longitudine dell'indirizzo
// che si trovando dentro un array di oggetti result -> position
//dobbiamo quindi fare una funzione che prende questi valori e li restituisce alla cost roma, in modo tale che nella show avremo la mappa dell'appartamento.
// questo link https://developer.tomtom.com/maps-sdk-web-js/tutorials-use-cases/how-add-and-customize-location-marker è utile de vogliamo segnalare 
//l'appartamento in mappa

 
var map = tt.map({
  key: API_KEY,
  container: 'map-div',
  center: roma,
  zoom: 12
});

tt.services.fuzzySearch({
    key: API_KEY,
    query: 'Golden Gate Bridge'
  })
  .go()
  .then(function(response) {
    map = tt.map({
      key: API_KEY,
      container: 'map-div',
      center: response.results[0].position,
      zoom: 12
    });
  });

    //  //Here’s what our corresponding javascript would look like: 
    //  document.getElementById('geocodeBtn').onclick = function () { 
    //     var geocodeOptions = { 
    //         query: document.getElementById('geoLocationQuery').value, 
    //         key: 'RagRFtF86mML8SeN6kqbSiihdZpGAE1d' 
    //     }; 
    //     // Look up the geocode of the given address 
    //     tt.services.geocode(geocodeOptions).then(function (geocodeRes) { 
    //         console.log(geocodeRes); 
    //         var reverseOptions = { 
    //             position: geocodeRes.results[0].position, 
    //             key: 'SFEgCDToTBGViQbIoJhEw2gMgC4pbKkGz8AraLCFptCbudEn' 
    //         } 
            
    //         // with our geocode, do a reverse look-up to get our original address back 
    //         tt.services.reverseGeocode(reverseOptions).then(function (reverseRes) { 
    //             console.log(reverseRes); 
    //         }); 
    //     }); 
    // }; 