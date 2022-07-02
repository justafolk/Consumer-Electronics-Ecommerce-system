<script type="module">
    import {
        initializeApp
    } from 'https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js';

    import * as firebase from 'https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js';
    import {
        getDatabase
    } from 'https://www.gstatic.com/firebasejs/9.4.0/firebase-database.js';

    import {
        getAuth,
        createUserWithEmailAndPassword,
        signInWithPopup,
        GoogleAuthProvider
    } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-auth.js";

    import * as firebaseui from "https://www.gstatic.com/firebasejs/ui/6.0.1/firebase-ui-auth.js";

    const firebaseConfig = {

        apiKey: "AIzaSyBMni84scE38mh1hThy95DJdd6ikmF5Ygs",

        authDomain: "idkbruh-60b83.firebaseapp.com",

        databaseURL: "https://idkbruh-60b83-default-rtdb.firebaseio.com",

        projectId: "idkbruh-60b83",

        storageBucket: "idkbruh-60b83.appspot.com",

        messagingSenderId: "438943076807",

        appId: "1:438943076807:web:9c2394b5d04557a13f49e2"

    };


    const app = initializeApp(firebaseConfig);

    const database = getDatabase(app);
    const auth = getAuth();

    var ui = new firebaseui.auth.AuthUI(auth);

    var uiConfig = {
        callbacks: {
            signInSuccessWithAuthResult: function(authResult, redirectUrl) {
                // User successfully signed in.
                // Return type determines whether we continue the redirect automatically
                // or whether we leave that to developer to handle.
                return true;
            },
            uiShown: function() {
                // The widget is rendered.
                // Hide the loader.
                document.getElementById('loader').style.display = 'none';
            }
        },
        // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
        signInFlow: 'popup',
        signInSuccessUrl: '<url-to-redirect-to-on-success>',
        signInOptions: [
            // Leave the lines as is for the providers you want to offer your users.
            app.auth.GoogleAuthProvider.PROVIDER_ID,
            app.auth.FacebookAuthProvider.PROVIDER_ID,
            app.auth.TwitterAuthProvider.PROVIDER_ID,
            app.auth.GithubAuthProvider.PROVIDER_ID,
            app.auth.EmailAuthProvider.PROVIDER_ID,
            app.auth.PhoneAuthProvider.PROVIDER_ID
        ],
        // Terms of service url.
        tosUrl: '<your-tos-url>',
        // Privacy policy url.
        privacyPolicyUrl: '<your-privacy-policy-url>'
    };


    //     console.log("hi");



    // const provider = new GoogleAuthProvider();
    // googlesign.addEventListener('click', (e) => {
    // signInWithPopup(auth, provider)
    //   .then((result) => {
    //     // This gives you a Google Access Token. You can use it to access the Google API.
    //     const credential = GoogleAuthProvider.credentialFromResult(result);
    //     const token = credential.accessToken;
    //     // The signed-in user info.
    //     const user = result.user;
    //     // ...
    //   }).catch((error) => {
    //     // Handle Errors here.
    //     const errorCode = error.code;
    //     const errorMessage = error.message;
    //     // The email of the user's account used.
    //     const email = error.customData.email;
    //     // The AuthCredential type that was used.
    //     const credential = GoogleAuthProvider.credentialFromError(error);
    //     // ...
    //   });
    // });

    //     submit.addEventListener('click', (e) => {

    //         var email = document.getElementById("username").value;
    //         var password = document.getElementById("password").value;
    //         console.log(email);
    //         console.log(password);

    //         createUserWithEmailAndPassword(auth, email, password)
    //             .then((userCredential) => {
    //                 // Signed in 
    //                 const user = userCredential.user;
    //                 alert(user);
    //                 // ...
    //             })
    //             .catch((error) => {
    //                 const errorCode = error.code;
    //                 const errorMessage = error.message;
    //                 // ..
    //                 alert('errorMessage');
    //             });
    //     });
</script>
