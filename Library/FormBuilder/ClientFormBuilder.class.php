<?php
namespace Library\FormBuilder;

class ClientFormBuilder extends \Library\FormBuilder
{
  public function build($vars)
  {
    $this->form->add(new \Library\Field\StringField(array(
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
    	'required' => true,	
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new \Library\Validator\NotNullValidator('Merci de spécifier l\'auteur du client'),
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 100,
       	'required' => true,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('Le nom spécifié est trop long (100 caractères maximum)', 100),
          new \Library\Validator\NotNullValidator('Merci de spécifier le nom du client'),
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Organisation',
        'name' => 'organisation',
		'maxLength' => 100,
    	'required' => false,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier l\'organisation du client'),
        	new \Library\Validator\MaxLengthValidator('L\'organisation spécifié est trop long (100 caractères maximum)', 100),		
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Email',
        'name' => 'email',
		'maxLength' => 100,
    	'required' => true,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier l\'email du client'),
        	new \Library\Validator\MaxLengthValidator('L\'email spécifié est trop long (100 caractères maximum)', 100),
        	new \Library\Validator\EmailValidator('Merci de donner un e-mail valide'),		
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Téléphone',
        'name' => 'telephone',
		'maxLength' => 100,
    	'required' => false,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier le téléphone du client'),
        	new \Library\Validator\MaxLengthValidator('Le téléphone spécifié est trop long (100 caractères maximum)', 100),
        	new \Library\Validator\TelephoneValidator('Merci de donner un numéro de téléphone valide (en France)'),	
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Adresse',
        'name' => 'adresse',
		'maxLength' => 100,
    	'required' => false,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier l\'adresse du client'),
        	new \Library\Validator\MaxLengthValidator('L\'adresse spécifié est trop long (100 caractères maximum)', 100),		
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Code postale',
        'name' => 'codepostale',
		'maxLength' => 100,
    	'required' => false,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier le code postale du client'),
        	new \Library\Validator\MaxLengthValidator('Le code postale spécifié est trop long (100 caractères maximum)', 100),
        	new \library\Validator\CodePostaleValidator('Merci de donner un code postale valide (en France)')		
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Ville',
        'name' => 'ville',
		'maxLength' => 100,
    	'required' => false,
        'validators' => array(
          	new \Library\Validator\NotNullValidator('Merci de spécifier la ville du client'),
        	new \Library\Validator\MaxLengthValidator('La ville spécifié est trop long (100 caractères maximum)', 100),		
        ),
       )));
       
  }
}