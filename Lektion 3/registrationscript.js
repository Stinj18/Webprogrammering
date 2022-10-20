
function chechform() {
    var username = document.getElementById("username").value;
    var regexN = RegExp(/([A-Z]|[a-z]{2,}) && \s && \w{1,}/);
    if(regexN.test(username)){
        alert("The username should contain at leat two characters and no digit");
        return false;
    }
    
    var password=document.getElementById("password").value;
    var regexP = RegExp(/(([a-z]{1,}) && ([A-Z]{1,}) && [0-9]{1,}))/);

    if(regexP.test(password)) {
        alert("Password is not correct");
        return false;
    } else {
          return true;
    }
}
