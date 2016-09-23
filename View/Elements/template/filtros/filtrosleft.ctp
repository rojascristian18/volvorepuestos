

<div id="filtroleft">
    <?= $this->Form->create('Producto', array('id' => 'filtros', 'action' => 'buscar', 'inputDefaults' => array('div' => false, 'label' => false))); ?>
        <div class="form">
            <h2>Catálogo de repuestos</h2>

            <div class="form-group">
                <?= $this->Form->input('categoria', array(
                    'data-tipo'   => 'categoria',
                    'selected'    => (! empty($filtros['filtro']['categoria']) ? $filtros['filtro']['categoria'] : false),
                    'options'   => $ListaCategoriasFiltro,
                    'multiple'    => false,
                    'class'     => 'form-control',
                    'empty'     => 'Selecciona categoría'
                  )
                ); ?>               
            </div>

            <div class="form-group"> 

                <?= $this->Form->input('rangoPrecio', array(
                    'data-tipo'   => 'rangoPrecio',
                    'selected'    => (! empty($filtros['filtro']['rangoPrecio']) ? $filtros['filtro']['rangoPrecio'] : false),
                    'options'   => array('asc' => 'Menor a Mayor', 'desc' => 'Mayor a Menor'),
                    'multiple'    => false,
                    'class'     => 'form-control',
                    'empty'     => 'Filtrar por precio'
                  )
                ); ?>  

            </div>

            <div class="form-group">

                <?= $this->Form->input('modeloCamion', array(
                    'data-tipo'   => 'modeloCamion',
                    'selected'    => (! empty($filtros['filtro']['modeloCamion']) ? $filtros['filtro']['modeloCamion'] : false),
                    'options'   => $ListaModelos,
                    'multiple'    => false,
                    'class'     => 'form-control',
                    'empty'     => 'Filtrar por modelo camión'
                  )
                ); ?>                  
            </div>

            <div class="form-group">
                    <button type="submit" class="animated btn btn-default">Buscar Repuesto</button>
            </div>



        </div>
    <?= $this->Form->end(); ?>
</div>