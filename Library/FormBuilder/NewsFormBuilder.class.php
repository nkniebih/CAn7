<?php
namespace Library\FormBuilder;

class NewsFormBuilder extends \Library\FormBuilder
{
  public function build($vars)
  {
    $this->form->add(new \Library\Field\StringField(array(
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new \Library\Validator\NotNullValidator('Merci de spécifier l\'auteur de la news'),
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Titre',
        'name' => 'titre',
        'maxLength' => 100,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new \Library\Validator\NotNullValidator('Merci de spécifier le titre de la news'),
        ),
       )))
       ->add(new \Library\Field\TextField(array(
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 8,
        'cols' => 60,
        'validators' => array(
          new \Library\Validator\NotNullValidator('Merci de spécifier le contenu de la news'),
        ),
       )));
  }
}