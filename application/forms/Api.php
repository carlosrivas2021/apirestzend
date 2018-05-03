<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Form_Api extends Zend_Form
{

     public function init()
    {
       $this->setName('api');

        //campo hidden para guardar id de album
        $id = new Zend_Form_Element_Text('id');
        $id->addFilter('Int');

        //creamos <input text> para escribir nombre album
        $nombre = new Zend_Form_Element_Text('name');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $identificacion = new Zend_Form_Element_Text('identification');
        $identificacion->setLabel('Identificación:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('email:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $tlf = new Zend_Form_Element_Text('phonePrimary');
        $tlf->setLabel('$tlf:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $tlf2 = new Zend_Form_Element_Text('phoneSecondary');
        $tlf2->setLabel('$tlf2:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $fax = new Zend_Form_Element_Text('fax');
        $fax->setLabel('$fax:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $mobile = new Zend_Form_Element_Text('mobile');
        $mobile->setLabel('mobile:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $observations = new Zend_Form_Element_Text('observations');
        $observations->setLabel('$observations:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $address = new Zend_Form_Element_Text('direccion');
        $address->setLabel('address:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        $city = new Zend_Form_Element_Text('city');
        $city->setLabel('city:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
       $cliente=new Zend_Form_Element_Checkbox('cliente');
       $cliente->setLabel('Cliente:');
       $provedor=new Zend_Form_Element_Checkbox('provedor');
       $provedor->setLabel('Provedor:');
       $vendedor=new Zend_Form_Element_Select('vendedor');
       $vendedor->setLabel('Vendedor');
       $termino=new Zend_Form_Element_Select('termino');
       $termino->setLabel('termino');
       $listaprecio=new Zend_Form_Element_Select('listaprecio');
       $listaprecio->setLabel('Lista de Precio');

        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        //agrego los objetos creadosal formulario
        $this->addElements(array($id, $nombre, $identificacion,
            $email,$tlf,$tlf2,$fax,$mobile,$observations,$address,$city,$cliente,$provedor,$vendedor,
            $termino,$listaprecio,
            $submit));
    }
}
