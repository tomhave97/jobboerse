<?php
class Job extends AppModel {
    public $validate = array(
        'firma' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'bezeichnung' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'beschreibung' => array(
            'rule' => array('lengthBetween', 20, 5000),
            'required' => true,
            'message' => 'Es sind nur zwischen 20 - 5000 Buchstaben erlaubt.'
        ),
        'kurzbeschreibung' => array(
            'rule' => array('lengthBetween', 10, 100),
            'required' => true,
            'message' => 'Es sind nur zwischen 10 - 100 Buchstaben erlaubt.'
        ),
        'ort' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'Bitte geben Sie eine Stadt an.'
        ),
        'gehalt' => array(
            'rule' => 'numeric',
            'required' => false,
            'message' => 'Geben Sie bitte nur Zahlen an.'
        ),
        'email' => array(
            'rule' => array('email', true),
            'required' => true,
            'message' => 'Geben Sie eine gültige Email-Adresse an.'
        )    
    );
}
