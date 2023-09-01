<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css" />
  </head>
  <body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="/index.php">
            <img src="/build/img/logo.svg" alt="Logotipo de bienes raices" />
          </a>
          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="Icono del menu Responsive" />
          </div>
          <div class="derecha">
            <img class="dark-mode-boton" src="/build/img/dark-mode.svg" />
            <nav class="navegacion">
              <a href="admin/index.php">[Panel de administracion]</a>
              <a href="nosotros.php">Nosotros</a>
              <a href="anuncios.php">Anuncios</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
            </nav>
          </div>
        </div>
        <?php if($inicio) { ?>
          <h1>Venta de casas y apartamentos Exclusivos de lujo</h1>
        <?php } ?>
      </div>
    </header>