import {
  initializeApp
} from 'https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js';

import {
  getDatabase
} from 'https://www.gstatic.com/firebasejs/9.4.0/firebase-database.js';

import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithPopup,
  signInWithRedirect,
  GoogleAuthProvider
} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-auth.js";


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

const provider = new GoogleAuthProvider();
provider.addScope('https://www.googleapis.com/auth/user.phonenumbers.read');
provider.addScope('https://www.googleapis.com/auth/user.addresses.read');
googlesign.addEventListener('click', (e) => {
  signInWithPopup(auth, provider)
    .then((result) => {
      // This gives you a Google Access Token. You can use it to access the Google API.
      const credential = GoogleAuthProvider.credentialFromResult(result);
      const token = credential.accessToken;
      alert(token);
      alert(auth.lastNotifiedUid);

      for ( const item in auth.currentUser){
        console.log(item);
        console.log(auth.currentUser[item]);
      }
      // The signed-in user info.
      const user = result.user;
      alert(typeof user.phoneNumber);
      for (const item in user) {
        console.log(item);
      }
      for (const key in user.providerData){
        console.log(user.providerData[key]);
      }

      
      alert(user.displayName);
      var chunks = user.displayName.split(/\s+/);
      var arr = [chunks.shift(), chunks.join(' ')];
      console.log(arr);
      document.getElementById("inputFirstName").value = arr[0];
      document.getElementById("inputLastName").value = arr[1];
      alert(user.phoneNumber);
      document.getElementById("username").value = user.email;
      document.getElementById("firebaseop").value = user.uid;
      window.location.replace("http://localhost:3456/login_firebase.php?name=" + user.displayName + "&email=" + user.email + "&uid=" + user.uid + "&firebase_id="+auth.lastNotifiedUid + "&photo=" + user.photoURL);



    }).catch((error) => {
      // Handle Errors here.
      const errorCode = error.code;
      const errorMessage = error.message;
      console.log(errorCode);
      console.log(errorMessage);
      // The email of the user's account used.
      // The AuthCredential type that was used.
      const credential = GoogleAuthProvider.credentialFromError(error);
      // ...
    });
});


osubmit.addEventListener('click', (e) => {

  var email = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  console.log(email);
  console.log(password);

  createUserWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
      // Signed in 
      const user = userCredential.user;
      document.getElementById("firebaseop").value = user.uid;
      alert(user.uid + " has been created");
      // ...
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;
      // ..
      alert('errorMessage');
    });
  // sleep for 2 seconds
  setTimeout(function () {
    document.forms["signupform"].submit();
  }
    , 2000);

});

