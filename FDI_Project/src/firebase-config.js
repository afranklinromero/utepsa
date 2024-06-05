// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getFirestore } from 'firebase/firestore';
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDdKwKms-ELUN5VNjsCnviIA4AM_EoIXC0",
  authDomain: "notestream-5caf2.firebaseapp.com",
  projectId: "notestream-5caf2",
  storageBucket: "notestream-5caf2.appspot.com",
  messagingSenderId: "704606549811",
  appId: "1:704606549811:web:df2c8bbb49b5f1ca32f046",
  measurementId: "G-WFLB4XV5MR"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const analytics = getAnalytics(app);
const db = getFirestore(app);

export { auth, db };