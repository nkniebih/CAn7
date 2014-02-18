<?php
namespace Applications\Backend\Modules\Calendrier;

class CalendrierController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des calendriers de matériel');
    
    $manager = $this->managers->getManagerOf('Calendrier');
    
    $this->page->addVar('listeCalendrier', $manager->getAll());
    $this->page->addVar('nombreCalendrier', $manager->count());
  }
  
  public function executeInsert(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Ajout d\'un calendrier');
  }
  
  public function processForm(\Library\HTTPRequest $request)
  {
  	if($request->method() == 'POST')
  	{
	  	$calendrier = new \Library\Entities\Calendrier(
  			array(
  					'auteur' => $request->postData('auteur'),
  					'nom' => $request->postData('nom')
  			)
  		);
  		// L'identifiant de le materiel est transmis si on veut le modifier.
  		if ($request->getExists('id'))
  		{
  			$calendrier->setId($request->getData('id'));
  		}
  	}
  	else 
  	{
  		// L'identifiant du materiel est transmis si on veut le modifier.
  		if ($request->getExists('id'))
  		{
  			$calendrier = $this->managers->getManagerOf('Calendrier')->getUnique($request->getData('id'));
  		}
  		else
  		{
  			$calendrier = new \Library\Entities\Calendrier;
  		}
  	}
  
  	$formBuilder = new \Library\FormBuilder\CalendrierFormBuilder($calendrier);
  	
  	$formBuilder->build(Null);
  	$form = $formBuilder->form();
  	$formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Calendrier'), $request);
  	if ($formHandler->process())
  	{
  		$this->app->user()->setFlash($calendrier->isNew() ? 'Le calendrier a bien été ajouté !' : 'Le calendrier a bien été modifié !');
  		$this->app->httpResponse()->redirectTemp('/admin/calendrier',2);
  	}
  	$this->page->addVar('form', $form->createView());
  }
  
  public function executeUpdate(\Library\HTTPRequest $request)
  {
	$this->processForm($request);  
  	$this->page->addVar('title', 'Modification d\'un calendrier');
  }
  
  public function executeDelete(\Library\HTTPRequest $request)
  {
  	$this->managers->getManagerOf('Calendrier')->delete($request->getData('id'));
  
  	$this->app->user()->setFlash('Le calendrier a bien été supprimé !');
  
  	$this->app->httpResponse()->redirect('calendrier');
  }

}