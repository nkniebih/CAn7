<?php
namespace Library\Models;

use \Library\Entities\Calendrier;

class CalendrierManager_PDO extends CalendrierManager
{
	public function getAll()
	{
		$sql = 'SELECT id, nom FROM site_calendrier ORDER BY id DESC';

		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Calendrier');

		$listeCalendrier = $requete->fetchAll();

		$requete->closeCursor();

		return $listeCalendrier;
	}

	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id, nom FROM site_calendrier WHERE id = :id');
		$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$requete->execute();

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Calendrier');

		if ($calendrier = $requete->fetch())
		{
			return $calendrier;
		}

		return null;
	}

	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM site_calendrier')->fetchColumn();
	}

	protected function add(Calendrier $calendrier)
	{
		$requete = $this->dao->prepare('INSERT INTO site_calendrier SET nom= :nom');

		$requete->bindValue(':nom', $calendrier->nom());

		$requete->execute();
	}

	protected function modify(Calendrier $calendrier)
	{
		$requete = $this->dao->prepare('UPDATE site_calendrier SET nom=:nom WHERE id = :id');

		$requete->bindValue(':nom', $calendrier->nom());
		
		$requete->bindValue(':id', $calendrier->id(), \PDO::PARAM_INT);

		$requete->execute();
	}

	public function delete($id)
	{
		$this->dao->exec('DELETE FROM site_calendrier WHERE id = '.(int) $id);
	}
}