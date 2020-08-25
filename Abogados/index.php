<?php require_once 'includes/header.php'; ?>
<body>
    <div class="row">
        <div class="col s12 m7 offset-m3">
            <div class="card">
                <h2 class="center-align">Inicio de sesión</h2>
                <?php
                if (!empty($_SESSION['errorLogin'])):
                    ?>
                    <?php
                    echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Usuario o contraseña no validos',
                              })
                         </script> 
                         ";
                    ?>
                    <?php
                endif;
                $_SESSION['errorLogin'] = null;
                ?>
                <div class="card-image">
                    <img src="img/perfil.jpg"style="width: 200px; height: 200px; margin: auto;">
                </div>
                <div class="card-content center-align">
                    <div class="row">
                        <form method="POST" action="Metodos/login.php">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="card-action center-align">
                                <input type="submit" class="waves-effect waves-light btn pulse white-text" value="Ingresar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>