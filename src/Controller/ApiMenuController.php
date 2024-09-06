<?php 

namespace App\Controller;

use App\Repository\Menu\MenuPageRepository;
use App\Repository\Menu\MenuRepository;
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

    public function getMenus(String $localeIso, MenuRepository $menuRepository, MenuPageRepository $menuPageRepository): JsonResponse
    {
        // Logique personnalisée pour récupérer les données de menu
        $menuData = [];
        $locales = $this->localeService->getLocaleByCode($localeIso);

        $menu = $menuRepository->findOneBy(['lang' => $locales->getId()]);
        $menuPageTopLevel = $menuPageRepository->findOneBy(['menu' => $menu->getId(), 'menuItemParent' => null]);
        $menuData = $this->menuBuilderService->buildMenu($menuPageTopLevel->getId(), $localeIso);        


        // dd($menuPageTopLevelItems);
        return new JsonResponse($menuData);
    }
}


