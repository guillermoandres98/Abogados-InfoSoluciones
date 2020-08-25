<?php require_once 'navAdmin.php'; ?>
<div class="row">
    <div class="col m8 offset-m2">
        <table class="centered striped highlight">
            <thead>
                <tr>
                    <th>Asingacion de Causas</th>

                </tr>
            </thead>

            <tbody>
                <?php
                $DetalleCausa = conseguirProyectos($db);
                if (!empty($proyectos)):
                    foreach ($proyectos as $item):
                        ?>
                        <tr>
                            <td><?= $item['nombreProyecto'] ?></td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
<h1>hola</h1>