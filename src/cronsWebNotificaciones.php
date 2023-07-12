<?php

// Initialize Firebase
var config = {
  apiKey: "AIzaSyDQRP55gmT55655oWL555YI72c2qBaz55",
  authDomain: "sizzling47.firebaseapp.com",
  databaseURL: "https://sizzling47.firebaseio.com",
  storageBucket: "sizzling47.appspot.com",
  messagingSenderId: "18347558755"
};
firebase.initializeApp(config);


var messaging = firebase.messaging();


messaging.requestPermission()
  .then(function() {
    console.log('Se han aceptado las notificaciones');
  })
  .catch(function(err) {
    mensajeFeedback(err);
    console.log('No se ha recibido permiso / token: ', err);
  });

?>