<?php

namespace App\Controller;

use App\service\Capitalize;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article/")
 */

class ArticleController extends AbstractController
{
	protected $articles;
	protected $capitalize;

	public function __construct()
	{
		$this->capitalize = new Capitalize;
		$this->articles = [
    		["libelle" => $this->capitalize->firstUpper("ordiNateur"),
    		 "prix"    => 500,
    		 "marque"  => $this->capitalize->firstUpper("Samsung")
    		],
    		["libelle" => $this->capitalize->firstUpper("voiture"),
    		 "prix"    => 1700,
    		 "marque"  => $this->capitalize->firstUpper("opel")
    		]
    	];
	}

    /**
     * @Route("liste", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', ["liste_articles" => $this->articles]
        );
    }

    /**
     * @Route("/desc/{id}", name="description")
     */
    public function showArticle($id){
    	$article = [
    		"libelle" => $this->capitalize->firstUpper("ordiNateur"),
    		 "prix"    => 500,
    		 "marque"  => $this->capitalize->firstUpper("Samsung")
    	];
    	return $this->render("article/show.html.twig", ["art" => $article, "action" => $id]);
    }
}
