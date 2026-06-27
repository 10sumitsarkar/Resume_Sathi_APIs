// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/

const firebaseConfig = {
    apiKey: "AIzaSyAYANyF-7KiOONso2EinguR64pr7_fkqRI",
    authDomain: "w3coderschool-d2f95.firebaseapp.com",
    projectId: "w3coderschool-d2f95",
    storageBucket: "w3coderschool-d2f95.appspot.com",
    messagingSenderId: "522977570113",
    appId: "1:522977570113:web:ae438c6416a904c7dc45c0",
    measurementId: "G-GY9GZ0KJ01"
};


firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
