// Import the functions you need from the SDKs you need
import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js";

import {
    getDatabase,
    ref,
    onValue
} from "https://www.gstatic.com/firebasejs/9.6.0/firebase-database.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
document.getElementById("startLstn").addEventListener("click", startListen, false);
var startflag = false;

function startListen() {
    const firebaseConfig = {
        apiKey: "AIzaSyAoW6MBFQ_Oc1ijljSEcmjDg28gQ-15EK8",
        authDomain: "regify-67daa.firebaseapp.com",
        projectId: "regify-67daa",
        storageBucket: "regify-67daa.appspot.com",
        messagingSenderId: "64215801309",
        appId: "1:64215801309:web:5dc445c7cb3e17b3e96a34",
        databaseURL: "https://regify-67daa-default-rtdb.asia-southeast1.firebasedatabase.app",
        measurementId: "G-FT2Z3HKCSL"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const db = getDatabase();

    const starCountRef = ref(db, 'users/');
    onValue(starCountRef, (snapshot) => {
        const data = snapshot.val();
        if((data.status == "CLAIM")&&(data.sub == sub)&&(data.std == std)&&startflag){
            processClaim(data.sid, data.name);
        }

        if(startflag == false){
            startflag = true;
        }
    });
    console.log("initiated");
}
var req_otpShow = document.getElementById("otpShow");
var req_name = document.getElementById("name");

function processClaim(sid, name) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var xhhtp_res = JSON.parse(this.responseText);
        if (xhhtp_res["STATUS"] == "SUCCESS") {
            req_name.innerText = "Welcome "+name+"!";
            req_otpShow.innerText = "OTP: "+xhhtp_res["OTP"];
            console.log(xhhtp_res["OTP"]);
        }
    };
    var status = "CLAIM";
    var args = `sid=${sid}&std=${std}&sub=${sub}&status=${status}`;

    xhttp.open("POST", "../processClaim.php");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(args);
}
