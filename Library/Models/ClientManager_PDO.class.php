<?php
namespace Library\Models;

use \Library\Entities\Client;

class ClientManager_PDO extends ClientManager
{
	public function getList($debut = -1, $limite = -1)
	{
		$sql = 'SELECT id, auteur, nom,organisation,email,telephone,adresse,codepostale,ville FROM site_client ORDER BY id DESC';

		if ($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
		}

		$requete = $this->dao->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Client');

		$listeClient = $requete->fetchAll();

		$requete->closeCursor();

		return $listeClient;
	}

	public function getUnique($id)
	{
		$requete = $this->dao->prepare('SELECT id, auteur, nom,organisation,email,telephone,adresse,codepostale,ville FROM site_client WHERE id = :id');
		$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$requete->execute();

		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Client');

		if ($client = $requete->fetch())
		{
			return $client;
		}

		return null;
	}

	public function count()
	{
		return $this->dao->query('SELECT COUNT(*) FROM site_client')->fetchColumn();
	}

	protected function add(Client $client)
	{
		$requete = $this->dao->prepare('INSERT INTO site_client SET auteur= :auteur, nom= :nom,organisation= :organisation,email= :email,telephone= :telephone,adresse= :adresse,codepostale= :codepostale,ville= :ville');

		$requete->bindValue(':auteur', $client->auteur());
		$requete->bindValue(':nom', $client->nom());
		$requete->bindValue(':organisation', $client->organisation());
		$requete->bindValue(':email', $client->email());
		$requete->bindValue(':telephone', $client->telephone());
		$requete->bindValue(':adresse', $client->adresse());
		$requete->bindValue(':codepostale', $client->codepostale());
		$requete->bindValue(':ville', $client->ville());

		$requete->execute();
	}

	protected function modify(Client $client)
	{
		$requete = $this->dao->prepare('UPDATE site_client SET auteur=:auteur, nom=:nom,organisation=:organisation,email=:email,telephone=:telephone,adresse=:adresse,codepostale=:codepostale,ville=:ville WHERE id = :id');

		$requete->bindValue(':auteur', $client->auteur());
		$requete->bindValue(':nom', $client->nom());
		$requete->bindValue(':organisation', $client->organisation());
		$requete->bindValue(':email', $client->email());
		$requete->bindValue(':telephone', $client->telephone());
		$requete->bindValue(':adresse', $client->adresse());
		$requete->bindValue(':codepostale', $client->codepostale());
		$requete->bindValue(':ville', $client->ville());
		
		$requete->bindValue(':id', $client->id(), \PDO::PARAM_INT);

		$requete->execute();
	}

	public function delete($id)
	{
		$this->dao->exec('DELETE FROM site_client WHERE id = '.(int) $id);
	}
}