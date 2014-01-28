<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListView
 *
 * @author Rux
 */
class ListView extends CWidget {
    public $dataSource;
    
    public function run(){
        $this->render('list');
    }
}

?>
