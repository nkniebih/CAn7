<?php
namespace Library\FormBuilder;

class MaterielFormBuilder extends \Library\FormBuilder
{
  public function build($var)
  {
  	
    $this->form->add(new \Library\Field\StringField(array(
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
    	'required' => true,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new \Library\Validator\NotNullValidator('Merci de spécifier l\'auteur du matériel'),
        ),
       )))
       ->add(new \Library\Field\StringField(array(
        'label' => 'Nom',
        'name' => 'nom',
        'maxLength' => 100,
       	'required' => true,
        'validators' => array(
          new \Library\Validator\MaxLengthValidator('Le nom spécifié est trop long (100 caractères maximum)', 100),
          new \Library\Validator\NotNullValidator('Merci de spécifier le nom du matériel'),
        ),
       )))
       ->add(new \Library\Field\SelectField(array(
       		'label' => 'Catégorie',
       		'name' => 'categorie',
       		'multiple' => false,
       		'options' => $var,
       )))
       ->add(new \Library\Field\StringField(array(
       		'label' => 'Prix',
       		'name' => 'prix',
       		'maxLength' => 100,
       		'required' => false,
       		'validators' => array(
       				new \Library\Validator\FloatValidator('Merci de spécifier le prix du materiel'),
       				new \Library\Validator\FloatPositiveValidator('Merci de spécifier un prix positif'),
       		),
       )))
       ->add(new \Library\Field\StringField(array(
       		'label' => 'Quantite',
       		'name' => 'quantite',
       		'maxLength' => 100,
       		'required' => false,
       		'validators' => array(
       				new \Library\Validator\FloatValidator('Merci de spécifier la quantité du matériel'),
       				new \Library\Validator\FloatPositiveValidator('Merci de spécifier une quantité positive'),
       		),  
       	)))     
       	->add(new \Library\Field\StringField(array(
       		'label' => 'En réparation',
       		'name' => 'reparation',
       		'maxLength' => 100,
       		'required' => false,
       		'validators' => array(
       				new \Library\Validator\FloatValidator('Merci de spécifier la quantité du matériel'),
       				new \Library\Validator\FloatPositiveValidator('Merci de spécifier une quantité positive'),
       		),
       )))
       ->add(new \Library\Field\StringField(array(
       		'label' => 'Poids',
       		'name' => 'poids',
       		'maxLength' => 100,
       		'required' => false,
       		'validators' => array(
       				new \Library\Validator\FloatValidator('Merci de spécifier le poids du matériel'),
       				new \Library\Validator\FloatPositiveValidator('Merci de spécifier un poids positif'),
       		),
       )))
       ->add(new \Library\Field\StringField(array(
       		'label' => 'Puissance',
       		'name' => 'puissance',
       		'maxLength' => 100,
       		'required' => false,
       		'validators' => array(
       				new \Library\Validator\FloatValidator('Merci de spécifier la puissance du matériel'),
       				new \Library\Validator\FloatPositiveValidator('Merci de spécifier une puissance positive'),
       		),
       )))
       ->add(new \Library\Field\PictureField(array(
       		'label' => 'Image',
       		'name' => 'image',
       		'maxsize' => 10000000, 
       )))
       ->add(new \Library\Field\TextField(array(
        'label' => 'Remarque',
        'name' => 'remarque',
        'rows' => 8,
        'cols' => 60,
       	'required' => true,
        'validators' => array(
        ),
       )));
  }
}