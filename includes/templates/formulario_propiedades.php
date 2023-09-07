<fieldset>
            <legend>Información general</legend>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

            <?php if($propiedad->imagen){ ?>
                <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
            <?php }?>

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones de la propiedad:</label>
            <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo sanitizar($propiedad->habitaciones); ?>">

            <label for="wc">Baños de la propiedad:</label>
            <input type="number" id="wc" name="propiedad[wc]" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo sanitizar($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
        </fieldset>