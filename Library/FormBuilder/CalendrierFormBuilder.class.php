<?php
namespace Library\FormBuilder;

class CalendrierFormBuilder extends \Library\FormBuilder
{
  public function build($vars)
  {
    $this->form->add(new \Library\Field\StringField(array(
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 100,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('Le nom spécifié est trop long (100 caractères maximum)', 100),
          new \Library\Validator\NotNullValidator('Merci de spécifier le nom de la catégorie'),
        ),
       )));
  }
}