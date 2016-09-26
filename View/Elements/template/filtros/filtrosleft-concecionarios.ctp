<div id="filtroleft">
    <h2>Concesionarios en Chile</h2>
        <ul>
        <?  foreach ($ListaConcesionarios as $concesionario) : ?>
                <li><?=$this->Html->link(
                    '<span>&middot; </span> ' . $concesionario['Concesionario']['nombre'], 
                    array('action' => 'detail', $concesionario['Concesionario']['slug']),
                    array('escape' => false)
                    ); ?></li>
        <?  endforeach; ?>
        </ul>
</div>