<?php
namespace Applications\Backend\Modules\News;

use Library\Form;
class NewsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des news');
    
    $manager = $this->managers->getManagerOf('News');
    
    $this->page->addVar('listeNews', $manager->getList());
    $this->page->addVar('nombreNews', $manager->count());
  }
  
  public function executeInsert(\Library\HTTPRequest $request)
  {
  	$this->processForm($request);
  	$this->page->addVar('title', 'Ajout d\'une news');
  }
  
  public function processForm(\Library\HTTPRequest $request)
  {
  	if ($request->method() == 'POST')
    {
      $news = new \Library\Entities\News(
        array(
          'auteur' => $request->postData('auteur'),
          'titre' => $request->postData('titre'),
          'contenu' => $request->postData('contenu')
        )
      );
      
      if ($request->getExists('id'))
      {
        $news->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la news est transmis si on veut la modifier.
      if ($request->getExists('id'))
      {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
      }
      else
      {
        $news = new \Library\Entities\News;
      }
    }

    $formBuilder = new \Library\FormBuilder\NewsFormBuilder($news);
    $formBuilder->build(NULL);
    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('News'), $request);
    if ($formHandler->process())
    {
      $this->app->user()->setFlash($news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !');
      $this->app->httpResponse()->redirectTemp('/admin/',2);
    }
    $this->page->addVar('form', $form->createView());
  }
  
  public function executeUpdate(\Library\HTTPRequest $request)
  {
 	$this->processForm($request);
  	$this->page->addVar('title', 'Modification d\'une news');
  }
  
  public function executeDelete(\Library\HTTPRequest $request)
  {
  	$this->managers->getManagerOf('News')->delete($request->getData('id'));
  
  	$this->app->user()->setFlash('La news a bien été supprimée !');
  
  	$this->app->httpResponse()->redirect('news');
  }
  
}