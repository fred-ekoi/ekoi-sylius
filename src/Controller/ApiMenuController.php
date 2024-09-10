<?php 

namespace App\Controller;

use App\Service\LocaleService;
use App\Service\MenuBuilderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiMenuController extends AbstractController
{

    private $localeService;
    private $menuBuilderService;

    public function __construct(LocaleService $localeService, MenuBuilderService $menuBuilderService)
    {
        $this->localeService = $localeService;
        $this->menuBuilderService = $menuBuilderService;
    }

    public function getMenus(String $localeIso): JsonResponse
    {
        // Logique personnalisée pour récupérer les données de menu
        $menuData = [];

        $menuData = $this->menuBuilderService->buildMenu($localeIso);        


        // dd($menuPageTopLevelItems);
        return new JsonResponse($menuData);
    }
}


