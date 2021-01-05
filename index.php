<?php include("includes/header.php"); ?>
    
    
    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
              
              
              <div class="card card-body">
              
              <div class="form-group">
              <a href="zoologico.php" class="btn btn-primary btn-lg active" role="button">Zoologico</a>
              </div>
              
              <div class="form-group">
              <a href="animales.php" class="btn btn-primary btn-lg active" role="button">Animales</a>
              </div>
    
                <div class="card card-body">
                    <form name="filtro" method="POST" action="filtro_ani.php">
                        <div class="form-group">
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar Animal (ID)">
                        </div>
                    <input type="submit" class="btn btn-success btn-block" name="search" value="Buscar">
                    </form>
                </div>
                </div>
               </div>
            </div>
    </div>
    

<?php include("includes/footer.php"); ?>