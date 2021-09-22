"use strict"

function showUser() {
    var xhttp = new XMLHttpRequest(); 

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.querySelector("#output").innerHTML = this.responseText; 
        }
    };

    xhttp.open("POST", "action.php", false);
    xhttp.send();
}
function createUser(name, surname, username,password,birthdate,email) {
    var xhttp = new XMLHttpRequest(); 

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            document.querySelector("#alert-space").innerHTML = this.responseText; 
        }
    };
    xhttp.open("GET", "addUser.php?name=" + name + "&surname=" + surname + "&username=" + username + "&password=" + password + "&birthdate=" + birthdate + "&email=" + email, false);

    xhttp.send();

    showUser();
}

document.querySelector("#create").addEventListener("click", function() {

    var userForm = document.querySelector("#userForm");
    userForm.classList.toggle("d-none");
    
    document.querySelector("#name").value = "";
    document.querySelector("#surname").value = "";
    document.querySelector("#username").value = "";
    document.querySelector("#password").value = "";
    document.querySelector("#birthdate").value = "";
    document.querySelector("#email").value = "";
    });
    
    document.querySelector("#createUser").addEventListener("click", function() {
        var name = document.querySelector("#name").value;
        var surname = document.querySelector("#surname").value;
        var password = document.querySelector("#password").value;
        var username =  document.querySelector("#username").value;
        var birthdate = document.querySelector("#birthdate").value;
        var email =  document.querySelector("#email").value;
        createUser(name,surname,username,password,birthdate,email,password);
    
    
        
        
    });    
    