<?php
namespace Library\FormBuilder;

class CategorieFormBuilder extends \Library\FormBuilder
{
  public function build($vars)
  {
    $this->form->add(new \Library\Field\StringField(array(
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new \Library\Validator\NotNullValidator('Merci de spécifier l\'auteur de la catégorie'),
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 100,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('Le nom spécifié est trop long (100 caractères maximum)', 100),
          new \Library\Validator\NotNullValidator('Merci de spécifier le nom de la catégorie'),
        ),
       )))
       ->add(new \Library\Field\TextField(array(
        'label' => 'Remarque',
        'name' => 'remarque',
        'rows' => 8,
        'cols' => 60,
        'validators' => array(
        ),
       )));
  }
}