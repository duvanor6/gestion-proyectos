function mostImageDiv(num){
  document.getElementById("userDiv"+num).classList.add("viewImageDiv");
}
function ocultImageDiv(num){
  document.getElementById("userDiv"+num).classList.remove("viewImageDiv");
}
(function(){  
  var viewFormBtn = document.getElementById("formTaskBtn");
  var formDivId = document.getElementById("formTasksDiv");
  var formUsersDiv = document.getElementById("formUsersDiv");
  var formRecursosDiv = document.getElementById("formRecursosDiv");
  var viewUserForm = document.getElementById("formUsersBtn");
  var viewRecursoForm = document.getElementById("formRecursos");
  
  formDivId.style.display = "none";
  formUsersDiv.style.display = "none";
  formRecursosDiv.style.display = "none";


  viewRecursoForm.addEventListener("click", function(){
    if(formRecursosDiv.style.display == "none"){
      formRecursosDiv.style.display = "block";
    } else {
      formRecursosDiv.style.display = "none";
    }
  });


  viewUserForm.addEventListener("click", function(){
    if(formUsersDiv.style.display == "none"){
      formUsersDiv.style.display = "block";
    } else {
      formUsersDiv.style.display = "none";
    }
  });

  viewFormBtn.addEventListener("click", function(){
    if(formDivId.style.display == "none"){
      formDivId.style.display = "block";
    } else {
      formDivId.style.display = "none";
    }
  });

  //--------------------------------------
  var fileDivs= document.getElementsByClassName("fileDiv");

  for(var i=0; i<fileDivs.length; i++){
    var fileName = fileDivs[i].children[2].innerHTML;
    var fileExtension = fileName.split('.').pop();
    var icon= fileDivs[i].children[0];
    var fileInfo= fileDivs[i].children[1];    
    icon.innerHTML = '<i class="far fa-file"></i>';
    fileInfo.innerHTML= fileExtension.toUpperCase();
  }

  var btnAddTask = document.querySelector("#btnSendTask");
  var btnAddPersonal = document.querySelector("#btnAddPersonalButton");
  var btnAddRecursos = document.querySelector("#btnSendRecurso");

  btnAddRecursos.addEventListener("click", function(){
    var titleRecurso= document.getElementById("recurso-title").value;
    var descRecurso= document.getElementById("recurso-description").value;
    var valorRecurso= document.getElementById("recurso-valor").value;
    
    if(titleRecurso.length > 3 && descRecurso.length > 3){
      sendRecurso(titleRecurso, descRecurso, valorRecurso);
      document.getElementById("errorLine").innerHTML= "";
    } else {
      document.getElementById("errorLine").innerHTML= "Minimum 4 caracters";
    }
  });


  function sendRecurso(title, desc, valor){
    var xml = new XMLHttpRequest();
    var url= document.getElementById('getUrl').value;
    var idProject= document.getElementById('idProject').value;
    var phpPage= url+ 'select/addRecursos/' +idProject;
    var header = 'titleRecurso=' + title + '&descRecurso=' + desc + '&valorRecurso=' + valor;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
        window.location.reload();
      }
    }

    xml.send(header);
  }

  //Agregar personal

  btnAddPersonal.addEventListener("click", function(){

    var usernamePersonal= document.getElementById("developerlist");
    var idPersonal = usernamePersonal.value;
    console.log(usernamePersonal);
    if(usernamePersonal.length > 3){
      sendPersonal(idPersonal);
      document.getElementById("errorLine").innerHTML= "";
    } else {
      document.getElementById("errorLine").innerHTML= "Minimum 4 caracters";
    }
  });


  function sendPersonal(personalId){
    var xml = new XMLHttpRequest();
    var url= document.getElementById('getUrl').value;
    var idProject= document.getElementById('idProject').value;
    var phpPage= url+ 'select/addPersonal/' +idProject;
    var header = 'personalId=' + personalId;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
       window.location.reload();
      }
    }

    xml.send(header);
  }

  //Agregar tareas

  btnAddTask.addEventListener("click", function(){
    var titleTask= document.getElementById("task-title").value;
    var descTask= document.getElementById("task-description").value;
    
    if(titleTask.length > 3 && descTask.length > 3){
      sendTask(titleTask, descTask);
      document.getElementById("errorLine").innerHTML= "";
    } else {
      document.getElementById("errorLine").innerHTML= "Minimum 4 caracters";
    }
  });

  function sendTask(title, desc){
    var xml = new XMLHttpRequest();
    var url= document.getElementById('getUrl').value;
    var idProject= document.getElementById('idProject').value;
    var phpPage= url+ 'select/addTask/' +idProject;
    var header = 'title=' + title + '&desc=' + desc;

    xml.open('POST', phpPage, true);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onreadystatechange = function() {
      if(xml.readyState === 4 & xml.status === 200) {
      	window.location.reload();
      }
    }
    xml.send(header);
  }

//----------------------------------------------------------------
  var modal = document.getElementById("myModal");
  var btnModal = document.getElementById("btnModalDelete");
  var span = document.getElementsByClassName("close");
  for(var i=0; i<span.length; i++){
    span[i].onclick = function() {
      modal.style.display = "none";
    }
  }
  btnModal.onclick = function() {
    modal.style.display = "block";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }




}());