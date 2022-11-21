function showpassword() {
    var a = document.getElementById("showpassword");
    var x = document.getElementById("passwordfield");
    var z = document.getElementById("confirmpasswordfield");
    if (a.innerText === "visibility_off") {
        x.type = "text";
        a.innerText = "visibility";
    } else {
        x.type = "password";
        a.innerText = "visibility_off";
    }
    if (a.innerText === "visibility_off") {
        z.type = "text";
        a.innerText = "visibility";
    } else {
        z.type = "password";
        a.innerText = "visibility_off";
      }
  }

