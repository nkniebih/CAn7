<?php
namespace Library\Models;
use \Library\Entities\Calendrier;

abstract class CalendrierManager extends \Library\Manager {
	/**
	 * Méthode retournant le liste de calendrier en entier
	 * @return array la liste de calendrier. Chaque entrée est une instance de Calendrier
	 */
	abstract public function getAll();
	
	/**
	 * Méthode retournant un calendrier précis.
	 * @param $id int L'identifiant de le calendrier à récupérer
	 * @return Calendrier Le calendrier demandé
	*/
	abstract public function getUnique($id);
	
	/**
	 * Méthode renvoyant le nombre de calendrier total.
	 * @return int
	*/
	abstract public function count();
	
	/**
	 * Méthode permettant d'ajouter un calendrier.
	 * @param $calendrier Calendrier Le calendrier à ajouter
	 * @return void
	*/
	abstract protected function add(Calendrier $calendrier);
	
	/**
	 * Méthode permettant d'enregistrer une calendrier.
	 * @param $calendrier calendrier le calendrier à enregistrer
	 * @see self::add()
	 * @see self::modify()
	 * @return void
	*/
	public function save(Calendrier $calendrier)
	{
		if ($calendrier->isValid())
		{
			$calendrier->isNew() ? $this->add($calendrier) : $this->modify($calendrier);
		}
		else
		{
			throw new \RuntimeException('La calendrier doit être validée pour être enregistrée');
		}
	}
	
	/**
	 * Méthode permettant de modifier un calendrier.
	 * @param $calendrier calendrier le calendrier à modifier
	 * @return void
	 */
	abstract protected function modify(Calendrier $calendrier);
	
	/**
	 * Méthode permettant de supprimer un calendrier.
	 * @param $id int L'identifiant du calendrier à supprimer
	 * @return void
	*/
	abstract public function delete($id);
}
