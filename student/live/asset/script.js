var lastClaim = null;

function rollClaim(sid, std, sub){
    if(lastClaim!=null && (Date.now()-lastClaim)/1000<10){
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText);
        var xhhtp_res = JSON.parse(this.responseText);
        if (xhhtp_res["status"] == "SUCCESS") {
            console.log("succ");
        }
        if (xhhtp_res["status"] == "TOOFREQ") {
            console.log("tofreq");
        }
    };
    var status = "CLAIM";
    var args = `sid=${sid}&std=${std}&sub=${sub}&status=${status}`;

    xhttp.open("POST", "../claimRoll.php");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(args);
    lastClaim = Date.now();
}

function otpSubmit() {
    var otp = document.getElementById("otp").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        console.log(this.responseText);
        var xhhtp_res = JSON.parse(this.responseText);
        if (xhhtp_res["status"] == "SUCCESS") {
            console.log("succ");
        }
        if (xhhtp_res["status"] == "TOOFREQ") {
            console.log("tofreq");
        }
    };
    var status = "CLAIM";
    var args = `OTP=${otp}&SUB=${sub}`;

    xhttp.open("POST", "../otpSubmit.php");
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(args);
}