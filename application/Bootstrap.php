<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initView() {
        $view = new Zend_View();
        $view->setEncoding('UTF-8');
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv(
                'Content-Type', 'text/html;charset=utf-8'
        );
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
                        'ViewRenderer'
        );
        $viewRenderer->setView($view);
        return $view;
    }

}
