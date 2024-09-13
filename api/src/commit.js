document.addEventListener("DOMContentLoaded", function () {
  const socket = new WebSocket("ws://localhost:8080");
  const comentarioForm = document.getElementById("comentario-form");
  const comentarioSection = document.querySelector("#comentarios-section");

  if (comentarioForm) {
    socket.onmessage = function (event) {
      try {
        const data = JSON.parse(event.data);
        mostrarComentario(data); // Utilizamos la función mostrarComentario existente
      } catch (error) {
        console.error("Error al procesar el mensaje del servidor:", error);
      }
    };

    comentarioForm.addEventListener("submit", function (event) {
      event.preventDefault();

      const idUserElement = document.getElementById("id_user");
      const idRestauranteElement = document.getElementById("id_restaurante");
      const comentarioElement = document.getElementById("comentario");
      const nameElement = document.getElementById("name");
      const puntuacionElement = document.querySelector('input[name="puntuacion"]:checked');

      if (idUserElement && idRestauranteElement && comentarioElement && nameElement && puntuacionElement) {
        const idUser = idUserElement.value;
        const idRestaurante = idRestauranteElement.value;
        const comentario = comentarioElement.value;
        const name = nameElement.value;
        const puntuacion = puntuacionElement.value;

        console.log("Puntuación seleccionada:", puntuacion);

        if (!idUser || !idRestaurante || !comentario || !name || !puntuacion) {
          console.error("Todos los campos son requeridos.");
          return;
        }

        const fecha_creacion = new Date().toISOString();

        const comentarioData = JSON.stringify({
          id_user: idUser,
          id_restaurante: idRestaurante,
          comentario: comentario,
          fecha_creacion: fecha_creacion,
          name: name,
          puntuacion: puntuacion
        });

        console.log("Message sent to server:", comentarioData);

        if (socket.readyState === WebSocket.OPEN) {
          socket.send(comentarioData);
        } else {
          console.error("WebSocket is not open to send data.");
        }

        comentarioElement.value = "";
      } else {
        console.error("Alguno de los elementos del formulario no existe en el DOM.");
      }
    });
  } else {
    console.error("Elemento 'comentario-form' no encontrado en el DOM.");
  }

  function mostrarComentariosExistente() {
    if (typeof comentarios !== "undefined" && comentarios.length > 0) {
      comentarios.forEach(function (data) {
        mostrarComentario(data);
      });
    }
  }

  function mostrarComentario(data) {
    const comentarioElement = document.createElement("div");
    comentarioElement.classList.add("comentario");
    comentarioElement.innerHTML = `
      <div class="user-info">
        <div class="details">
          <h4>${data.name} <span>${new Date(data.fecha_creacion).toLocaleString()}</span>
          ${'★'.repeat(data.puntuacion)}${'☆'.repeat(5 - data.puntuacion)}
          </h4>
          <p>${data.comentario}</p>
        </div>
      </div>
    `;
    comentarioSection.appendChild(comentarioElement);
  }

  mostrarComentariosExistente();
});
