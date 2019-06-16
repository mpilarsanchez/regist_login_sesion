<?php

if ($_GET){

  $categoria = $_GET["categoria"];
  function datos_ferias($categoria){
    $archivo = "./db/ferias.json";
    //para leer y obtener el contenido del archivo
    $json_content = file_get_contents($archivo);
    //para convertir el contenido del archivo en un array
    $array_content = json_decode($json_content,true);

    foreach ($array_content["ferias"] as $feria ) {
      $datos_ferias =[];
      if($feria["categoria"] == $categoria){
        $datos_ferias[] = $feria;
      }
    }
    return $datos_ferias;
  }
}
 ?>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="./css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald|Pathway+Gothic+One|Source+Sans+Pro&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cookie|Inconsolata&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/14dd9125ec.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <header>
  <?php include("header.php") ?>
  </header>
  <main>
    <div class="inicio">
      <h1>FERIAS AMERICANAS</h1>
      <h2>Elegi la feria segun su ubicacion o los productos que te gusten</h2>
      <i class="fas fa-store"></i>
    </div>
    <div class="botones">
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ORDENAR POR
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FILTRAR POR
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    </div>
    <hr>
    <?php if(empty(datos_ferias($categoria))) :?>
       <p style="color:red">Lo Sentimos No Hay Datos para la Categoria seleccionada</p>
    <?php endif ;?>
    <?php if(!empty(datos_ferias($categoria))) :?>
        <?php foreach (datos_ferias($categoria) as $feria) :?>
        <div class="feria">
          <div class="header-feria">
            <h3><?php echo $feria["nombre"] ?></h3>
            <h5><?php echo $feria["ubicacion"] ?></h5>
            <i class="fas fa-store"></i>
            <img src="images/mapa.jpeg" alt="">
            <button type="button" name="button"><a href="feria.php?id=<?= $feria["id"]?>" >Ver feria!</a></button>
          </div>
          <div class="cuerpo-feria">
            <div class="descripcion">
              <?php echo $feria["descripcion"] ?>
            </div>
            <img src="images/sillon.jpg" alt="">
            <img src="images/vajilla.jpg" alt="">
            <img src="images/ropa.jpg" alt="">
          </div>
        </div>
        <?php endforeach ?>
     <?php endif; ?>
  </main>
  <footer>
  <?php include("footer.php") ?>
  </footer>

  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
