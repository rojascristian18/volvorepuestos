<?php
App::uses('AppController', 'Controller');
class ConcesionariosController extends AppController
{


    public function index() {



        $FormularioEnviado = false;
        $EnvioError = false;
        $ErroresFormulario = false;

        
        if ($this->request->is('post')) {

            //instancia de Lead
            $this->Lead = ClassRegistry::init('Lead');

            //Primero verifica si pasa las validaciones locales
            $this->Lead->set($this->request->data);

            if ($this->Lead->validates()) {
                
                //Si valida, intenta grabarlo al DS de Landings
                //NOTA: EL ARREGLO DE DATOS FINAL A ENVIAR SE HACE EN EL MODEL::BEFORESAVE

                $save = $this->Lead->save($this->request->data);

                if (empty($save['code'])) {
                    $FormularioEnviado = true;
                }
                else {
                    $EnvioError = true;
                }

            }

            else {
                $ErroresFormulario = true;
            }

        }
        

        //instancia de Categoria
        //$this->Categoria = ClassRegistry::init('Categoria');
        $ListaConcesionarios = $this->Concesionario->find(
            'all',
            array (
                'conditions' => array(
                    'Concesionario.activo' => 1,
                ),
                'order' => array(
                    'Concesionario.orden' => 'ASC'
                )
            )
        );


        //instancia de Modelo
        $this->Regiones = ClassRegistry::init('Regiones');
        $ListaRegiones = $this->Regiones->find(
            'list',
            array (
                'fields' => array(
                    'nombre',
                ),
                'order' => array(
                    'Regiones.nombre' => 'ASC'
                )
            )
        ); 


        $this->set('CFG_PageTitle', 'titulo seo');
        $this->set('CFG_PageDescription', 'sin descripcion');
        $this->set('CFG_PageKeywords', 'key words sin configurar');

     
        $this->set(compact( 'ListaCategoriasFiltro', 'ListaConcesionarios', 'ListaRegiones'));

    }




	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 2
		);
		$concesionarios	= $this->paginate();
		//prx($concesionarios);
		$this->set(compact('concesionarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Concesionario->create();

			//arma el slug
			$this->request->data['Concesionario']['slug'] = strtolower(Inflector::slug($this->request->data['Concesionario']['nombre'], '-'));

			if ( $this->Concesionario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}

	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Concesionario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{

			//arma el slug
			$this->request->data['Concesionario']['slug'] = strtolower(Inflector::slug($this->request->data['Concesionario']['nombre'], '-'));

			if ( $this->Concesionario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Concesionario->find('first', array(
				'conditions'	=> array('Concesionario.id' => $id)
			));

			$concesionario = $this->request->data;
		}

		$this->set(compact('concesionario'));
	}

	public function admin_delete($id = null)
	{
		$this->Concesionario->id = $id;
		if ( ! $this->Concesionario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Concesionario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Concesionario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Concesionario->_schema);
		$Concesionario			= $this->Concesionario->alias;

		$this->set(compact('datos', 'campos', 'Concesionario'));
	}
}
