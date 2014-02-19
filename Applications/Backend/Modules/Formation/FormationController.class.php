<?php
namespace Applications\Backend\Modules\Formation;

class FormationController extends \Library\BackController
{
	public function executeIndex(\Library\HTTPRequest $request)
	{
		$this->page->addVar('title', 'Gestion des formations');

		$managerFormation = $this->managers->getManagerOf('Formation');

		$this->page->addVar('listeFormation', $managerFormation->getAll());
		$this->page->addVar('nombreFormation', $managerFormation->count());
	}

	public function executeInsert(\Library\HTTPRequest $request)
	{
		$this->processForm($request);
		$this->page->addVar('title', 'Ajout d\'une formation');
	}

	public function processForm(\Library\HTTPRequest $request)
	{
		if($request->method() == 'POST')
		{
			echo 'POST';
			$formation = new \Library\Entities\Formation(
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
			if($upload->move($request->postFile('image_tmp'), 'formation/', $request->postData('nom')))
			{
				$formation->setImage($upload->url());
			}
			// L'identifiant de le formation est transmis si on veut la modifier.
			if ($request->getExists('id'))
			{
				$formation->setId($request->getData('id'));
			}
		}
		else
		{
			// L'identifiant du formation est transmis si on veut le modifier.
			if ($request->getExists('id'))
			{
				$formation = $this->managers->getManagerOf('Formation')->getUnique($request->getData('id'));
			}
			else
			{
				$formation = new \Library\Entities\Formation;
			}
		}
		$listeCategorie = $this->managers->getManagerOf('Categorie')->getAllName();

		$formBuilder = new \Library\FormBuilder\FormationFormBuilder($formation);
		$formBuilder->build($listeCategorie);
		$form = $formBuilder->form();
		$formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Formation'), $request);
		if ($formHandler->process())
		{
			$this->app->user()->setFlash($formation->isNew() ? 'Le matériel a bien été ajouté !' : 'Le matériel a bien été modifié !');
			$this->app->httpResponse()->redirectTemp('/admin/formation',2);
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
		$this->page->addVar('title', 'Modification d\'une formation');
	}

	public function executeDelete(\Library\HTTPRequest $request)
	{
		$this->managers->getManagerOf('Formation')->delete($request->getData('id'));

		$this->app->user()->setFlash('Le formation a bien été supprimé !');

		$this->app->httpResponse()->redirect('formation');
	}

}
