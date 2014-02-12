<?php
namespace Library\Models;

use \Library\Entities\Materiel;

abstract class MaterielManager extends \Library\Manager
{
	/**
	 * Méthode retournant le liste du matériel en entier
	 * @return array la liste du matériel. Chaque entrée est une instance de Matériel.Ma
	 */
	abstract public function getAll();

	/**
	 * Méthode retournant une materiel précise.
	 * @param $id int L'identifiant de le materiel à récupérer
	 * @return Materiel Le materiel demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode renvoyant le nombre de materiel au total.
	 * @return int
	*/
	abstract public function count();
	/**
	 * Méthode permettant d'ajouter un materiel.
	 * @param $materiel Materiel Le materiel à ajouter
	 * @return void
	 */
	abstract protected function add(Materiel $materiel);
	
	/**
	 * Méthode permettant d'enregistrer une materiel.
	 * @param $materiel Materiel le materiel à enregistrer
	 * @see self::add()
	 * @see self::modify()
	 * @return void
	*/
	public function save(Materiel $materiel)
	{
		if ($materiel->isValid())
		{
			$materiel->isNew() ? $this->add($materiel) : $this->modify($materiel);
		}
		else
		{
			throw new \RuntimeException('Le materiel doit être validée pour être enregistrée');
		}
	}
	
	/**
	 * Méthode permettant de modifier une materiel.
	 * @param $materiel materiel le materiel à modifier
	 * @return void
	 */
	abstract protected function modify(Materiel $materiel);
	
	/**
	 * Méthode permettant de supprimer une materiel.
	 * @param $id int L'identifiant de le materiel à supprimer
	 * @return void
	*/
	abstract public function delete($id);
}