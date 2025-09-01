<?php
require_once(__DIR__.'/../views/header.php');
?>

<h1 class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;margin-top:4rem;">Pais API:</h1>

<!-- LISTAR -->
<div style="margin:5%;text-align:center;">
  <button id="btnListar" class="btn btn-primary set_buton" style="background-color:green;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">
    Cargar Países
  </button>
  <ul id="lista" class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:1.7rem;"></ul>
</div>

<!-- LEER UNO -->
<form id="formLeerUno">
<div style="text-align:center;">
    <div class="form-group" style="margin:5%;">
    <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:2rem;">Buscar País por ID:</label>
    <input type="number" name="id" placeholder="ID del país" required>
    <button type="submit" class="btn btn-primary set_buton" style="background-color:blue;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Buscar</button>
  </div>
  <div>
    <pre id="resultadoUno" class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:1.7rem;"></pre>
  </div>
</div>
</form>

<!-- INSERTAR -->
<form id="formInsert">
  <div class="form-group" style="margin:5%;text-align:center;">
    <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Agregar Pais:</label>
    <input type="text" maxlength="50" name="country" placeholder="Nombre del país" required> 
    <button type="submit" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Guardar</button>
  </div>
</form>

<!-- ACTUALIZAR -->
<form id="formUpdate">
  <div class="form-group" style="margin:5%;text-align:center;">
    <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Modificar País:</label>
    <input type="number" name="id" placeholder="ID del país" required>
    <input type="text" maxlength="50" name="country" placeholder="Nuevo nombre" required> 
    <button type="submit" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Actualizar</button>
  </div>
</form>

<!-- ELIMINAR -->
<form id="formDelete">
  <div class="form-group" style="margin:5%;text-align:center;">
    <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">Eliminar País:</label>
    <input type="number" name="id" placeholder="ID del país" required>
    <button type="submit" class="btn btn-primary set_buton" style="background-color:red;padding:1rem 3rem; font-size:1.4rem;font-weight:normal;">Eliminar</button>
  </div>
</form>

  <div class="form-group" style="margin:5%;text-align:center;">
    <label class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;">RESPUESTA API:</label>
    <pre class="generic-font" style="color: rgb(31, 43, 33)!important; font-weight:bolder;text-align:center;font-size:3rem;" id="respuesta"></pre>
  </div>



<script>
const apiUrl = "http://localhost/paginaweb/admin/api/country2.php";

// LISTAR TODOS
document.getElementById("btnListar").addEventListener("click", async () => {
  const resp = await fetch(apiUrl);
  const data = await resp.json();
  const lista = document.getElementById("lista");
  lista.innerHTML = "";
  if (data.success && Array.isArray(data.data)) {
    data.data.forEach(item => {
      const li = document.createElement("li");
      li.textContent = `${item.country_id}: ${item.country} (${item.last_update})`;
      lista.appendChild(li);
    });
  } else {
    lista.innerHTML = "<li>No se encontraron países</li>";
  }
});

// LEER UNO
document.getElementById("formLeerUno").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const id = formData.get("id");

  const resp = await fetch(`${apiUrl}?id=${id}`);
  const data = await resp.json();
  document.getElementById("resultadoUno").textContent = JSON.stringify(data, null, 2);
});

// INSERTAR
document.getElementById("formInsert").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData);
  
  const resp = await fetch(apiUrl, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data)
  });
  document.getElementById("respuesta").textContent = await resp.text();
});

// ACTUALIZAR
document.getElementById("formUpdate").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData);
  
  const resp = await fetch(`${apiUrl}?id=${data.id}`, {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ country: data.country })
  });
  document.getElementById("respuesta").textContent = await resp.text();
});

// ELIMINAR
document.getElementById("formDelete").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData);
  
  const resp = await fetch(`${apiUrl}?id=${data.id}`, {
    method: "DELETE"
  });
  document.getElementById("respuesta").textContent = await resp.text();
});
</script>

<?php
require_once(__DIR__.'/../views/footer.php');
?>
