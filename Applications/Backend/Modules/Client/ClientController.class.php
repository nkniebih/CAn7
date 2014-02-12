<?php
namespace Applications\Backend\Modules\Client;

use Library\Form;
class ClientController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des clients');
    
    $manager = $this->managers->getManagerOf('Client');
    
    $this->page->addVar('listeClient', $manager->getList());
    $this->page->addVar('nombreClient', $manager->count());
  }
  
  public function executeInsert(\Library\HTTPRequest $request)
  {
  	$this->processForm($request);
  	$this->page->addVar('title', 'Ajout d\'un client');
  }
  
  public function processForm(\Library\HTTPRequest $request)
  {
  	if ($request->method() == 'POST')
    {
      $client = new \Library\Entities\Client(
        	array(
          		'auteur' => $request->postData('auteur'),
          		'nom' => $request->postData('nom'),
          		'organisation' => $request->postData('organisation'),
        		'email' => $request->postData('email'),
        		'telephone' => $request->postData('telephone'),
        		'adresse' => $request->postData('adresse'),
        		'codepostale' => filter_var($request->postData('codepostale'),FILTER_VALIDATE_FLOAT),
        		'ville' => $request->postData('ville'),		
        )
      );      
      if ($request->getExists('id'))
      {
        $client->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la client est transmis si on veut la modifier.
      if ($request->getExists('id'))
      {
        $client = $this->managers->getManagerOf('Client')->getUnique($request->getData('id'));
      }
      else
      {
        $client = new \Library\Entities\Client;
      }
    }

    $formBuilder = new \Library\FormBuilder\ClientFormBuilder($client);
    $formBuilder->build(NULL);
    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Client'), $request);
    if ($formHandler->process())
    {
      $this->app->user()->setFlash($client->isNew() ? 'Le client a bien été ajouté !' : 'Lz client a bien été modifié !');
     // $this->app->httpResponse()->redirectTemp('/admin/client',2);
    }
    $this->page->addVar('form', $form->createView());
  }
  
  public function executeUpdate(\Library\HTTPRequest $request)
  {
 	$this->processForm($request);
  	$this->page->addVar('title', 'Modification d\'un client');
  }
  
  public function executeDelete(\Library\HTTPRequest $request)
  {
  	$this->managers->getManagerOf('Client')->delete($request->getData('id'));
  
  	$this->app->user()->setFlash('La client a bien été supprimée !');
  
  	$this->app->httpResponse()->redirect('client');
  }
  
}