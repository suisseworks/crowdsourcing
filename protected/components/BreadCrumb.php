<?php
/**
 * User: Matthias Malek
 * Date: 22/11/13
 * Time: 02:40 PM
 */


class BreadCrumb extends CWidget {

    public $links = array();
    public $delimiter = ' / ';

    public function run() {
        $this->render('breadCrumb');
    }

}