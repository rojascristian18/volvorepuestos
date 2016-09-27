<?php
App::uses('AppController', 'Controller');
class PostventasController extends AppController
{


    public function index() {

        $this->set('CFG_PageTitle', 'titulo seo');
        $this->set('CFG_PageDescription', 'sin descripcion');
        $this->set('CFG_PageKeywords', 'key words sin configurar');


        BreadcrumbComponent::add('Post venta ');

        $ListaBanners = $this->getHero('postventas');
     
        $this->set(compact('ListaBanners'));

    }



}
