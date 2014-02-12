<?php
namespace Applications\Backend\Modules\Categorie;

class CategorieController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des catégories de matériel');
    
    $manager = $this->managers->getManagerOf('Categorie');
    
    $this->page->addVar('listeCategorie', $manager->getAll());
    $this->page->addVar('nombreCategorie', $manager->count());
  }
  
  public function executeInsert(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Ajout d\'une catégorie');
  }
  
  public function processForm(\Library\HTTPRequest $request)
  {
  	if($request->method() == 'POST')
  	{
	  	$categorie = new \Library\Entities\Categorie(
  			array(
  					'auteur' => $request->postData('auteur'),
  					'nom' => $request->postData('nom')
  			)
  		);
  		// L'identifiant de le materiel est transmis si on veut la modifier.
  		if ($request->getExists('id'))
  		{
  			$categorie->setId($request->getData('id'));
  		}
  	}
  	else 
  	{
  		// L'identifiant du materiel est transmis si on veut le modifier.
  		if ($request->getExists('id'))
  		{
  			$categorie = $this->managers->getManagerOf('Categorie')->getUnique($request->getData('id'));
  		}
  		else
  		{
  			$categorie = new \Library\Entities\Categorie;
  		}
  	}
  
  	$formBuilder = new \Library\FormBuilder\CategorieFormBuilder($categorie);
  	
  	$formBuilder->build(Null);
  	$form = $formBuilder->form();
  	$formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Categorie'), $request);
  	if ($formHandler->process())
  	{
  		$this->app->user()->setFlash($categorie->isNew() ? 'La catégorie a bien été ajouté !' : 'La catégorie a bien été modifié !');
  		$this->app->httpResponse()->redirectTemp('/admin/categorie',2);
  	}
  	$this->page->addVar('form', $form->createView());
  }
  
  public function executeUpdate(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Modification d\'une catégorie');
  }
  
  public function executeDelete(\Library\HTTPRequest $request)
  {
  	$this->managers->getManagerOf('Categorie')->delete($request->getData('id'));
  
  	$this->app->user()->setFlash('La catégorie a bien été supprimé !');
  
  	$this->app->httpResponse()->redirect('categorie');
  }

}
  