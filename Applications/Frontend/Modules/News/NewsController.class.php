<?php
namespace Applications\Frontend\Modules\News;

class NewsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $nombreNews = $this->app->config->get('nombre_news');
    $nombreCaracteres = $this->app->config->get('nombre_caracteres');
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreNews.' dernières news');
    
    // On récupère le manager des news.
    $manager = $this->managers->getManagerOf('News');
    
    $nombrePage = ceil($manager->count() / $nombreNews);
    if($request->getData('page')>0)
    {
    	$newsDebut = ($request->getData('page') - 1) * $nombreNews;
    }else
    {
    	$newsDebut = 0;
    }

    $listeNews = $manager->getList($newsDebut, $nombreNews);
    
    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $news->setContenu($debut);
      }
    }
    
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeNews', $listeNews);
    $this->page->addVar('nombrePage', $nombrePage);
  }
  
  public function executeShow(\Library\HTTPRequest $request)
  {
  	$news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
  
  	if (empty($news))
  	{
  		$this->app->httpResponse()->redirect404();
  	}
  
  	$this->page->addVar('title', $news->titre());
  	$this->page->addVar('news', $news);
  }
}