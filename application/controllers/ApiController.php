<?php

class ApiController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $api = new Application_Model_Api();
        $this->view->api = $api->fetchAll();
    }

    public function termino() {
        $termino[] = "Manual";
        $termino[] = "De contado";
        $termino[] = "8 días";
        $termino[] = "15 días";
        $termino[] = "30 días";
        $termino[] = "60 días";

        return $termino;
    }

    public function encontrarAction() {
        $this->view->title = "Modificar contacto";
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Api ();
        //le pongo otro texto al boton submit
        $form->submit->setLabel('Modificar Contacto');
        $this->view->form = $form;
        $api = new Application_Model_Api();


        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            //print_r($formData);
            //veo si son validos
            $form->isValid($formData);
            $id = $form->getValue('id');
            $name = $form->getValue('name');
            $identification = $form->getValue('identification');
            $email = $form->getValue('email');
            $phonePrimary = $form->getValue('phonePrimary');
            $phoneSecondary = $form->getValue('phoneSecondary');
            $fax = $form->getValue('fax');
            $mobile = $form->getValue('mobile');
            $observations = $form->getValue('observations');
            $direccion = $form->getValue('direccion');
            $city = $form->getValue('city');
            $vendedor = $form->getValue('vendedor');
            $type = array();
            $termino = $form->getValue('termino');
            $listaprecio = $form->getValue('listaprecio');
            $address = array();
            $seller[id]=$vendedor;
            $term[id]=$termino;
            $priceList[id]=$listaprecio;
            //secho "Termino".$term;
           // echo "Precio".$priceList;
            //echo "Vendedor".$seller;

            $grabar = new Application_Model_Api();
            
            $grabar->edit($id, $name, $identification, $email, $phonePrimary, $phoneSecondary, $fax, $mobile, $observations, $address, $type, $seller, $term, $priceList);
            
            $this->_helper->redirector('index');
        }
        
        else {
            
            $a = $this->_getParam('id', 0);
            //si viene algun id
            if ($a > 0) {
                //CREO FORM
                $this->view->api = $api->fetchAll();
                $prueba = $api->find($a);


                echo "--------------<br>";



                echo "<br>--------------";
                $vendedores = new Application_Model_Vendedor();
                $recibi = $vendedores->fetchAll();
                foreach ($recibi as $value) {
                    if ($value[status] == 'active') {
                        $datos[$value[id]] = $value[name];
                    }
                }
                $precios = new Application_Model_ListaPrecio();
                $recibi = $precios->fetchAll();
                foreach ($recibi as $value) {
                    if ($value[status] == 'active') {
                        $datos1[$value[id]] = $value[name];
                    }
                }
                $form->populate($prueba);
                $form->direccion->setValue($prueba[address][address]);
                $form->city->setValue($prueba[address][city]);
                if ($prueba[type]) {
                    foreach ($prueba[type] as $value) {
                        //echo $value;
                        if ($value == 'client') {
                            $form->cliente->setChecked(1);
                        }
                        if ($value == 'provider') {
                            $form->provedor->setChecked(1);
                        }
                    }
                }
                $form->vendedor->addMultiOptions($datos);
                $form->vendedor->setValue($prueba[seller][id]);
                $form->listaprecio->addMultiOptions($datos1);
                $form->listaprecio->setValue($prueba[priceList][id]);
                $form->termino->addMultiOptions($this->termino());
                $form->termino->setValue($prueba[term][id]);
            }
        }
    }

    public function nuevoAction() {
        $this->view->title = "Nuevo contacto";
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Api ();
        //le pongo otro texto al boton submit
        $form->submit->setLabel('Nuevo Contacto');
        $this->view->form = $form;
        $api = new Application_Model_Api();
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            //print_r($formData);
            //veo si son validos
            $form->isValid($formData);
            //$id = $form->getValue('id');
            $name = $form->getValue('name');
            $identification = $form->getValue('identification');
            $email = $form->getValue('email');
            $phonePrimary = $form->getValue('phonePrimary');
            $phoneSecondary = $form->getValue('phoneSecondary');
            $fax = $form->getValue('fax');
            $mobile = $form->getValue('mobile');
            $observations = $form->getValue('observations');
            $direccion = $form->getValue('direccion');
            $city = $form->getValue('city');
            $vendedor = $form->getValue('vendedor');
            $type = array();
            $termino = $form->getValue('termino');
            $listaprecio = $form->getValue('listaprecio');
            $address = array();
            $seller[id]=$vendedor;
            $term[id]=$termino;
            $priceList[id]=$listaprecio;
            //echo "Termino".$term;
            //echo "Precio".$priceList;
            //echo "Vendedor".$seller;

            $grabar = new Application_Model_Api();
            
            $probando=$grabar->add($name, $identification, $email, $phonePrimary, $phoneSecondary, $fax, $mobile, $observations, $address, $type, $seller, $term, $priceList);
            //redirijo a accion index
            $this->_helper->redirector('index');
            
        }
        else {
            


                echo "--------------<br>";



                echo "<br>--------------";
                $vendedores = new Application_Model_Vendedor();
                $recibi = $vendedores->fetchAll();
                foreach ($recibi as $value) {
                    if ($value[status] == 'active') {
                        $datos[$value[id]] = $value[name];
                    }
                }
                $precios = new Application_Model_ListaPrecio();
                $recibi = $precios->fetchAll();
                foreach ($recibi as $value) {
                    if ($value[status] == 'active') {
                        $datos1[$value[id]] = $value[name];
                    }
                }
                //$form->populate($prueba);
                //$form->direccion->setValue($prueba[address][address]);
               // $form->city->setValue($prueba[address][city]);
                if ($prueba[type]) {
                    foreach ($prueba[type] as $value) {
                       // echo $value;
                        if ($value == 'client') {
                            $form->cliente->setChecked(1);
                        }
                        if ($value == 'provider') {
                            $form->provedor->setChecked(1);
                        }
                    }
                }
                $form->vendedor->addMultiOptions($datos);
                //$form->vendedor->setValue($prueba[seller][id]);
                $form->listaprecio->addMultiOptions($datos1);
               // $form->listaprecio->setValue($prueba[priceList][id]);
                $form->termino->addMultiOptions($this->termino());
               // $form->termino->setValue($prueba[term][id]);
            
        }
    }

    public function editAction() {
        $api = new Application_Model_Api();
        $this->view->api = $api->edit();
    }

    public function deleteAction() {
        $a = $this->_getParam('id', 0);
        $api = new Application_Model_Api();
        $this->view->api = $api->delete($a);
    }

}
