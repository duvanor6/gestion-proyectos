(function() {
  var registerBtn = document.getElementById("registerBtn");
  var url = document.getElementById('getUrl').value;
  var usernameVerif = "";

  registerBtn.addEventListener("click", function() {
    validRegister();
  });

  function validRegister() {
    var names = document.getElementById('names').value;
    var surnames = document.getElementById('surnames').value;
    var address = document.getElementById('address').value;
    var phone = document.getElementById('phone').value;
    var gender = document.getElementById('gender').value;
    var birthdate = document.getElementById('birthdate').value;
    var profession = document.getElementById('profession').value;
    var username = document.getElementById('username').value;
    var pass = document.getElementById('pass').value;
    
    console.log("names=" + names + "&surnames=" + surnames + "&address=" + address + "&phone=" + phone + "&gender=" + gender + "&birthdate=" + birthdate + "&profession=" + profession + "&username=" + username + "&pass=" + pass);
    var errorLine1 = document.getElementById("errorLine1");
    var errorLine2 = document.getElementById("errorLine2");

    checkUsername(username);

    var validUsernameDB = function() {
      if (usernameVerif !== "true") {
        errorLine1.innerHTML = "Este usuario ya está en uso!";
        document.getElementById('username').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('username').classList.remove("errorInput");
        return true;
      }
    }

    var validNames = function() {
      if (names.length < 3) {
        errorLine1.innerHTML = "Mínimo 3 letras en nombres";
        document.getElementById('names').classList.add("errorInputNames");
        return false;
      } else if (names.length > 35) {
        errorLine1.innerHTML = "Máximo 35 letras en nombres";
        document.getElementById('names').classList.add("errorInputNames");
        return false;
      } else if (names.search(/[^a-zA-Z]+/) !== -1) {
        errorLine1.innerHTML = "Solo se permiten letras";
        document.getElementById('names').classList.add("errorInputNames");
        return false;
      } else {
        document.getElementById('names').classList.remove("errorInputNames");
      }
      return true;
    }

    var validSurnames = function() {
      if (surnames.length < 5) {
        errorLine1.innerHTML = "Mínimo 5 letras en apellidos";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;
      } else if (surnames.length > 25) {
        errorLine1.innerHTML = "Máximo 25 letras en apellidos";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;
      } else if (surnames.search(/[^a-zA-Z]+/) !== -1) {
        errorLine1.innerHTML = "Solo se permiten letras";
        document.getElementById('surnames').classList.add("errorInputNames");
        return false;
      } else {
        document.getElementById('surnames').classList.remove("errorInputNames");
      }
      return true;
    }

    var validAddress = function() {
      if (address.length < 5) {
        errorLine1.innerHTML = "Mínimo 5 letras en dirección";
        document.getElementById('address').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('address').classList.remove("errorInput");
      }
      return true;
    }

    var validPhone = function() {
      if (phone.length < 10) {
        errorLine1.innerHTML = "Mínimo 10 dígitos en teléfono";
        document.getElementById('phone').classList.add("errorInput");
        return false;
      } else if (phone.length > 15) {
        errorLine1.innerHTML = "Máximo 15 dígitos en teléfono";
        document.getElementById('phone').classList.add("errorInput");
        return false;
      } else if (phone.search(/[^0-9]+/) !== -1) {
        errorLine1.innerHTML = "Solo se permiten números";
        document.getElementById('phone').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('phone').classList.remove("errorInput");
      }
      return true;
    }

    var validGender = function() {
      if (gender === "") {
        errorLine1.innerHTML = "Por favor, seleccione su sexo";
        document.getElementById('gender').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('gender').classList.remove("errorInput");
      }
      return true;
    }

    var validBirthdate = function() {
      if (birthdate === "") {
        errorLine1.innerHTML = "Por favor, seleccione su fecha de nacimiento";
        document.getElementById('birthdate').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('birthdate').classList.remove("errorInput");
      }
      return true;
    }

    var validProfession = function() {
      if (profession === "") {
        errorLine1.innerHTML = "Por favor, seleccione su profesión";
        document.getElementById('profession').classList.add("errorInput");
        return false;
      } else {
        document.getElementById('profession').classList.remove("errorInput");
      }
      return true;
    }

    if (validNames() && validSurnames() && validAddress() && validPhone() && validGender() && validBirthdate() && validProfession() && validUsernameDB()) {
      registerPhp(names, surnames, address, phone, gender, birthdate, profession, username, pass);
      checkRegister();
    } else {
      return false;
    }
  }

  function checkRegister() {
    var validRegisterDiv = document.querySelector("#validRegisterDiv");
    var checkRegisterDiv = document.querySelector("#checkRegisterDiv");

    validRegisterDiv.style.display = "none";
    checkRegisterDiv.style.display = "block";
  }

  function checkUsername(username) {
    var xml = new XMLHttpRequest();
    var phpPage = url + 'ajaxController/checkUsername';
    var header = "username=" + username;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if (xml.readyState === 4 && xml.status === 200) {
        console.log(xml.responseText)
        usernameVerif = xml.responseText;
      }
    }

    xml.send(header);
  }

  function registerPhp(names, surnames, address, phone, gender, birthdate, profession, username, pass) {
    var xml = new XMLHttpRequest();
    var phpPage = url + 'ajaxController/register';
    var header = "names=" + names + "&surnames=" + surnames + "&address=" + address + "&phone=" + phone + "&gender=" + gender + "&birthdate=" + birthdate + "&profession=" + profession + "&username=" + username + "&pass=" + pass;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if (xml.readyState === 4 && xml.status === 200) {
        document.getElementById("resultsOfValidForm").innerHTML = xml.responseText;
      }
    }

    xml.send(header);
  }

})();
