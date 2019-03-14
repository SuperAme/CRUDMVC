<?php require RUTA_APP . '/views/inc/header.php'; ?>
<div class="container-fluid">
    <table class="table table-responsive">
        <thead>
           <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
           </tr>        
        </thead>    
        <tbody>
        <?php foreach($datos['usuarios'] as $usuario): ?>
            <tr>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php echo $usuario->telefono; ?></td>
                <td><a href="<?php echo RUTA_URL; ?>/pages/editar/<?php echo $usuario->id_usuario ?>">Editar</a> </td>
                <td><a href="<?php echo RUTA_URL; ?>/pages/borrar/<?php echo $usuario->id_usuario ?>">Borrar</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    
</div>

<?php require RUTA_APP.'/views/inc/footer.php'; ?>
