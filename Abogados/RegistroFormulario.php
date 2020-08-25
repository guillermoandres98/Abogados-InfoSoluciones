<?php require_once './Metodos/helpers.php'; ?>
<?php
if(!isset($_SESSION)){
    session_start();
     }
?> 
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      
     <!--////////////////////////////////////////////////////DEBE INCLUIRSE EN EL HEAD////////////////////////////////////////////////////-->
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      <link rel="stylesheet" href="css/style.css">
      <!-- Importar SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
      <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       
    </head>
    <body>
        <!--/////////////////////////CONTENIDO DEL FORMULARIO////////////////////////////////////////////////////////-->
         <?php
                if (!empty($_SESSION['ErrorIngreso'])):
                    ?>
                    <?php
                    $error = $_SESSION['ErrorIngreso'];
                    echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text:  '$error',
                              })
                         </script> 
                         ";
                    ?>
                    <?php
                endif;
                $_SESSION['ErrorIngreso'] = null;
                ?>
        <?php
                if (!empty($_SESSION['completadoIngreso'])):
                    ?>
                    <?php
                    echo "<script>Swal.fire(
                    'Consulta',
                    'Ingresada con exito :)'
                            )
                     </script> 
                     ";
                    ?>
                    <?php
                endif;
                $_SESSION['completadoIngreso'] = null;
                ?>
        <div class="container1 left">
            <div class="card-panel teal lighten-5 center">
                 <span class="card-title colorLet" >C O N T A C T O</span>                  
                 <div class="row local">
                     <br>
                     <div class="col s1">                          
                             <i class="material-icons material-icons2 prefix left">contact_phone</i>                                
                     </div>  
                      <div class="col s7">
                         <p class="local2 colorLet" > Ingresar Telefono Contacto</p>
                      </div>
                 </div>
                 <div class="row local">                 
                     <div class="col s1">                         
                             <i class="material-icons material-icons2 prefix left">add_location</i>                                                                                   
                     </div>
                      <div class="col s7">
                          <p class="local2 colorLet" >Ingresar Direccion Contacto</p>
                      </div>
                 </div>
                 <div class="row local">                 
                     <div class="col s1">                         
                         <img class="left fontmax3" style="width: 3rem" src="img/fb.svg" >                                                                                  
                     </div>
                     <div class="col s6">
                         <br>
                         <a href="#" class="colorLet">Ir</a>
                      </div>
                 </div>
                 <div class="row local">                
                     <div class="col s1">                         
                         <img class="left fontmax3" style="width: 3rem" src="img/insta.svg" >                                                                                  
                     </div>
                     <div class="col s6">
                         <br>
                         <a href="#" class="colorLet">Ir</a>
                      </div>
                 </div>
            </div>
            
        </div>
            
        <div class="container2 right" id="full" style="">           
            <div class="card blue-grey darken-1">
                <div class="card-content white-text center">
                    <span class="card-title" style="">R E G I S T R A T E</span> 
                    <p class="fontmax">¿Cómo Podemos Ayudarte?</p>
                    <p class="fontmax2">Solo debes ingresar tus datos y registrarte</p>
                </div>                
                <form action="Metodos/ingresarContacto.php" method="POST">
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">credit_card</i>
                                <input id="rut_contacto" name="rut_contacto" style="color: white" type="text" class="validate">
                                <label for="rut_contacto" style="color: white">Rut</label>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nombre_contacto" name="nombre_contacto" style="color: white" type="text" class="validate" >
                                <label for="nombre_contacto" style="color: white">Nombre</label>
                            </div>                               
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="apellido_contacto" name="apellido_contacto" style="color: white" type="tel" class="validate" >
                                <label for="apellido_contacto" style="color: white">Apellido</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">contact_mail</i>
                                <input id="correo_contacto" name="correo_contacto" style="color: white" type="text" class="validate" >
                                <label for="correo_contacto" style="color: white">Correo Electronico</label>
                            </div>                                
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix">phone</i>
                                <input id="telefono_contacto" maxlength="9" name="telefono_contacto" style="color: white" type="tel" class="validate" >
                                <label for="telefono_contacto" style="color: white">Telefono</label>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col s10">
                                <label class="fontmax" for="seleccion_causa" style="color: white">Selector De Causas</label>
                                <select id="seleccion_causa" name="seleccion_causa" >
                                        <?php
                                        $causas = conseguirCausas($db);
                                        if (!empty($causas)):

                                            foreach ($causas as $item):
                                                ?>
                                                <option value="<?= $item['id_causas'] ?>">
                                                    <?= $item['nombrecausa'] ?></option>
                                                endif;
                                                <?php
                                            endforeach;

                                    endif
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="input-field col s10">
                            <textarea id="Detalle" name="Detalle" class="materialize-textarea" style="color: white"></textarea>
                            <label for="Detalle" style="color: white">Detalle</label>
                        </div>        
                    </div>
                    <div class="card-action center">
                        <input type="submit" value="Registrar" class="waves-effect waves-light btn-large" style="color:white"/>
                    </div>
                </form>
            </div>            
        </div>
       <script>
          document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
          });

          // Or with jQuery

          $(document).ready(function(){
            $('select').formSelect();
          });
      </script>
      <!--/////////////////////////FIN CONTENIDO////////////////////////////////////////////////////////-->
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>