function editField(field) {
  document.getElementById(field).disabled = false;
}

function saveField(field) {
  var value = document.getElementById(field).value;
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "updatePerfil.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert("Campo actualizado correctamente");
      document.getElementById(field).disabled = true;
    }
  };

  xhr.send(field + "=" + encodeURIComponent(value));
}
