<?php
namespace Applications\Backend\Modules\Devis;

class DevisController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion des devis');
    
    //$managerDevis = $this->managers->getManagerOf('Devis');
    
    //$this->page->addVar('listeDevis', $managerDevis->getAll());
    //$this->page->addVar('nombreDevis', $managerDevis->count());
  }
  
}