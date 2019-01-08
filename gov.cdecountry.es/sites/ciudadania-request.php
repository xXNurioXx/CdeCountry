<?php 
/************************ Variable area ************************/
$head['title'] = "Solicitar un cambio de CdeContraseña";
$site['active-tab'] = "tab-login";
?>
<main class="container">

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h1 class="text-center">Solicitud de CdeCiudadanía</h1>
        <form id="request-ciudadania-form" method="POST" action="#">
            <div class="col-md-12 mb-3 ml-0">
                <label class="noselect" for="lastname">Nombre <small class="vote-data-requiered">* Requerido</small></label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nombre Apellido" value="" required="" autocomplete="name">
                <div class="invalid-feedback">Un nombre de usuario es requerido.</div>
            </div>
            <div class="col-md-12 mb-3 ml-0">
                <label class="noselect" for="email">Email <small class="vote-data-requiered">* Requerido</small></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" value="" pattern="^((?!@hotmail)(?!@outlook)(?!@live).)*$" required="" title="Por favor introduce una dirección de correo que no sea @hotmail, @outlook o @live">
                <div class="invalid-feedback">Una direccion de email es requerida.</div>
                <small><b>Nota:</b> Recomendamos usar un correo <b>Gmail</b>. Algunos servidores de correo estan bloqueando nuestros correos. Entre ellos <b>outlook, hotmail y live</b>.</small>
            </div>
            <div class="col-md-12 mb-3 ml-0">
                <label class="noselect" for="twitter">Twitter <small class="vote-data-optional">* Opcional</small></label>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="@username" value="">
                <div class="invalid-feedback">Una cuanta de Twitter es opcional.</div>
            </div>
            <hr class="mb-3">
            <div class="col-md-12 mb-1 row">
                <div class="col-md-8">
                    <small class="d-block text-left"><b>Los datos proporcionados serán almacenados</b> en tu ficha de CdeCiudadano. <b>Cualquier persona</b> podrá visualizar tu <b>Nombre y Twitter</b>. La dirección de <b>correo electrónico se mantendrá oculta</b> y sera usada únicamente por el sistema. Una vez solicitada la CdeCiudadanía recibirá un correo con su acreditación y su CdeCarnet de identidad.</small>
                </div>
                <div class="col-md-4">
                    <button id="ciudadania-request-button" class="btn btn-success btn-block my-2 my-sm-0 btn-lg" href="#" type="submit">Solicitar<br>CdeCiudadania</button>
                </div>
            </div>
        </form>
    </div>

</main>