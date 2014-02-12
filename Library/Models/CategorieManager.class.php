<?php
namespace Library\Models;

use \Library\Entities\Categorie;

abstract class CategorieManager extends \Library\Manager
{
	/**
	 * Méthode retournant le liste du matériel en entier
	 * @return array la liste du matériel. Chaque entrée est une instance de Matériel.Ma
	 */
	abstract public function getAll();

	/**
	 * Méthode retournant une categorie précise.
	 * @param $id int L'identifiant de le categorie à récupérer
	 * @return categorie La categorie demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode renvoyant le nombre de categorie au total.
	 * @return int
	*/
	abstract public function count();
	/**
	 * Méthode permettant d'ajouter une categorie.
	 * @param $categorie categorie Le categorie à ajouter
	 * @return void
	 */
	abstract protected function add(Categorie $categorie);
	
	/**
	 * Méthode permettant d'enregistrer une categorie.
	 * @param $categorie Categorie la categorie à enregistrer
	 * @see self::add()
	 * @see self::modify()
	 * @return void
	*/
	public function save(Categorie $categorie)
	{
		if ($categorie->isValid())
		{
			$categorie->isNew() ? $this->add($categorie) : $this->modify($categorie);
		}
		else
		{
			throw new \RuntimeException('La catégorie doit être validée pour être enregistrée');
		}
	}
	
	/**
	 * Méthode permettant de modifier une categorie.
	 * @param $categorie catgorie la categorie à modifier
	 * @return void
	 */
	abstract protected function modify(Categorie $categorie);
	
	/**
	 * Méthode permettant de supprimer une categorie.
	 * @param $id int L'identifiant de la catégorie à supprimer
	 * @return void
	*/
	abstract public function delete($id);
}