<?php
namespace Applications\Frontend\Modules\Materiel;

class MaterielController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		//On ajoute une définition pour le titre.
		$this->page->addVar('title', 'Liste du matériel');
		
		//On récupère le manager des news.
		$manager = $this->managers->getManagerOf('Materiel');
		
		$listeMateriel = $manager->getAll();
		$this->page->addVar('listeMateriel', $listeMateriel);
	}
	
	public function executeShow(\Library\HTTPRequest $request)
	{
		$materiel = $this->managers->getManagerOf('Materiel')->getUnique($request->getData('id'));
		if(empty($materiel))
		{
			$this->app()->httpReponse()->redirect404();
			
		}
		$this->page->addVar('materiel', $materiel);
	}
}