<?php
namespace Library\Models;

use \Library\Entities\Client;

abstract class ClientManager extends \Library\Manager
{
  /**
   * Méthode retournant une liste de client demandée
   * @param $debut int Le premièr client à sélectionner
   * @param $limite int Le nombre de client à sélectionner
   * @return array La liste des clients. Chaque entrée est une instance de Client.
   */
  abstract public function getList($debut = -1, $limite = -1);
  
  /**
   * Méthode retournant un client précis.
   * @param $id int L'identifiant de le client à récupérer
   * @return Client Le client demandé
   */
  abstract public function getUnique($id);
  
  /**
   * Méthode renvoyant le nombre de client total.
   * @return int
   */
  abstract public function count();
  
  /**
   * Méthode permettant d'ajouter un client.
   * @param $client Client Le client à ajouter
   * @return void
   */
  abstract protected function add(Client $client);
  
  /**
   * Méthode permettant d'enregistrer une client.
   * @param $client client le client à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
  */
  public function save(Client $client)
  {
  	if ($client->isValid())
  	{
  		$client->isNew() ? $this->add($client) : $this->modify($client);
  	}
  	else
  	{
  		throw new \RuntimeException('La client doit être validée pour être enregistrée');
  	}
  }
  
  /**
   * Méthode permettant de modifier un client.
   * @param $client client le client à modifier
   * @return void
   */
  abstract protected function modify(Client $client);
  
  /**
   * Méthode permettant de supprimer un client.
   * @param $id int L'identifiant du client à supprimer
   * @return void
   */
  abstract public function delete($id);
  
}