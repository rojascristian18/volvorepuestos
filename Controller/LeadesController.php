<?php
App::uses('AppController', 'Controller');
class LeadesController extends AppController
{
	public function lead() {
		
		$enviado		= false;
		if ( $this->request->is('post') )
		{	
			/**
			 * Primero verifica si pasa las validaciones locales
			 */

			if ( $this->validates($this->request->data) )
			{	

				$ciudad			= ClassRegistry::init('Region')->findById($this->data['Lead']['region']);
				$modelo			= ClassRegistry::init('Modelo')->findById($this->data['Lead']['modelo']);		

				unset($this->request->data['Lead']['region'], $this->request->data['Lead']['modelo']);

				$this->request->data['Lead']['region']		= $ciudad['Region']['nombre'];
				$this->request->data['Lead']['modelo']		= $modelo['Modelo']['nombre'];


				$save		= $this->save($this->request->data);
				if ( empty($save['code']) )
				{
					$enviado		= true;
				}
				else
				{
					// DETALLE DEL ERROR EN $save['message]
					$this->Session->setFlash('Existe un error con su cotización. Intente nuevamente.', null, array(), 'dangerform');
					$this->redirect(array('controller' => 'categorias', 'action' => 'index'));
				}
			}
			else
			{	
				$this->Session->setFlash('Verifique los campos e intente nuevamente.', null, array(), 'dangerform');
				$this->redirect(array('controller' => 'categorias', 'action' => 'index'));
			}
		}
		
		$this->Session->setFlash('Cotización enviada con éxito.', null, array(), 'successform');
		$this->redirect(array('controller' => 'categorias', 'action' => 'index'));
	}

	private function validates($data) {

		if ( empty($data['Lead']['repuesto']) ) {
			$data['Lead']['repuesto'] = 'No especificado';
		}

		foreach ($data['Lead'] as $campo) {
			if (empty($campo) ) {
				return false;
			}
		}

		return true;
		
	}


	private function save( $data ) {

		$endpoint       = curl_init();
		$campos			= $data['Lead'];

		curl_setopt_array($endpoint, array(
		//CURLOPT_URL					=> 'http://landings.reach-latam-com/api/1.0/leads.json',
		CURLOPT_URL				=> 'http://dev.reach-latam.com/brandon/landings/api/1.0/leads.json',
		CURLOPT_POST				=> true,
		CURLOPT_POSTFIELDS			=> urldecode(http_build_query(array(
				'_method'				=> 'POST',
				'Cliente'				=> array(
					'identificador'			=> 'VOLVO-CAMIONES',
					'clave'					=> '7tRtazP*8qKtV#yk'
				),
				'Formulario'			=> array(
					'identificador'			=> 'REPUESTOS-VOLVO-CAMIONES'
				),
				'Campo'					=> $campos
			))),
			CURLOPT_RETURNTRANSFER		=> true,
			CURLOPT_VERBOSE				=> true,
			CURLINFO_HEADER_OUT			=> true,
			CURLOPT_TIMEOUT				=> 2000
		));
		$resultado			= curl_exec($endpoint);
		$err				= curl_errno($endpoint);
		curl_close($endpoint);
		
		$resultado			= json_decode($resultado, true);

		if ( is_null($resultado) )
		{
			$resultado		= array('code' => 500, 'message' => 'WS offline');
		}

		$this->request->data	= $resultado;
		return true;
	}
}
