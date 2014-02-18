<?php
namespace Applications\Backend\Modules\Materiel;

class MaterielController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des materiel');
    
    $managerMateriel = $this->managers->getManagerOf('Materiel');
    
    $this->page->addVar('listeMateriel', $managerMateriel->getAll());
    $this->page->addVar('nombreMateriel', $managerMateriel->count());
  }
  
  public function executeInsert(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Ajout d\'un materiel');
  }
  
  public function processForm(\Library\HTTPRequest $request)
  {
  	if($request->method() == 'POST')
  	{
  		echo 'POST';
  		$materiel = new \Library\Entities\Materiel(
  			array(
  					'auteur' => $request->postData('auteur'),
  					'nom' => $request->postData('nom'),
  					'prix' =>  filter_var($request->postData('prix'),FILTER_VALIDATE_FLOAT),
  					'puissance' => filter_var($request->postData('puissance'),FILTER_VALIDATE_FLOAT),
  					'quantite' => filter_var($request->postData('quantite'),FILTER_VALIDATE_FLOAT),
  					'remarque' => $request->postData('remarque'),
  					'categorie' => $this->managers->getManagerOf('Categorie')->getUnique($request->postData('categorie')),	
  					'reparation' => filter_var($request->postData('reparation'),FILTER_VALIDATE_FLOAT),
  					'poids' => filter_var($request->postData('poids'),FILTER_VALIDATE_FLOAT),
  					'volume' => filter_var($request->postData('volume'),FILTER_VALIDATE_FLOAT),
  			)
  		);
  		$upload = new \Library\Entities\Upload(array(
  				'dir' => $this->app->config()->get('dirSite').'upload/',
  				'maxsize' => 10000000,
  				'extensions' => array('png','gif','jpg','jpeg'),
  		));
  		if($upload->move($request->postFile('image_tmp'), 'materiel/', $request->postData('nom')))
  		{
  			$materiel->setImage($upload->url());
  		}
  		// L'identifiant de le materiel est transmis si on veut la modifier.
  		if ($request->getExists('id'))
  		{
  			$materiel->setId($request->getData('id'));
  		}
  	}
  	else 
  	{
  		// L'identifiant du materiel est transmis si on veut le modifier.
  		if ($request->getExists('id'))
  		{
  			$materiel = $this->managers->getManagerOf('Materiel')->getUnique($request->getData('id'));
  		}
  		else
  		{
  			$materiel = new \Library\Entities\Materiel;
  		}
  	}
  	$listeCategorie = $this->managers->getManagerOf('Categorie')->getAllName();
  	 
  	$formBuilder = new \Library\FormBuilder\MaterielFormBuilder($materiel);
  	$formBuilder->build($listeCategorie);
  	$form = $formBuilder->form();
  	$formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Materiel'), $request);
  	if ($formHandler->process())
  	{
  		$this->app->user()->setFlash($materiel->isNew() ? 'Le matériel a bien été ajouté !' : 'Le matériel a bien été modifié !');
  		$this->app->httpResponse()->redirectTemp('/admin/materiel',2);
  	}
  	$view =$form->createView();
  	$this->page->addVar('form', $view);
  	if($request->getExists('id'))
  	{
  	$this->page->addVar('id', $request->getData('id'));
  	}
  }
  
  public function executeUpdate(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Modification d\'une materiel');
  }
  
  public function executeDelete(\Library\HTTPRequest $request)
  {
  	$this->managers->getManagerOf('Materiel')->delete($request->getData('id'));
  
  	$this->app->user()->setFlash('Le materiel a bien été supprimé !');
  
  	$this->app->httpResponse()->redirect('materiel');
  }

}
  