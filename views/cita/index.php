<h1 class="nombre-pagina">Reservar Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y agenda tú cita</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Cita</button>
        <button type="button" data-paso="3">Reserva</button>
    </nav>

    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                    id="nombre"
                    type="text"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input
                    id="fecha"
                    type="date"
                    min="<?php echo date('Y-m-d', strtotime('+1 day') ); ?>"
                />
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <select class="campohora" id="hora">
                    <option value="12:00">00:00 </option>
                    <option value="12:00">12:00 Pm </option>
                    <option value="12:30">12:30 Pm </option>
                    <option value="13:00">13:00 Pm </option>
                    <option value="13:30">13:30 Pm </option>
                    <option value="14:00">14:00 Pm </option>
                    <option value="14:30">14:30 Pm </option>
                    <option value="15:00">15:00 Pm </option>
                    <option value="15:30">15:30 Pm </option>
                    <option value="16:00">16:00 Pm </option>
                    <option value="16:30">16:30 Pm </option> 
                    <option value="17:00">17:00 Pm </option>
                    <option value="17:30">17:30 Pm </option>
                    <option value="18:00">18:00 Pm </option>
                    <option value="18:30">18:30 Pm </option>

                </select>
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>" >

        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button 
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button 
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php 
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>