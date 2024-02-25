<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MenuDynamicController extends AbstractController
{
    #[Route('/menu/dynamic', name: 'app_menu_dynamic')]
    public function index(EntityManagerInterface $em, UrlGeneratorInterface $ugi): Response
    {
        $menus = $em->getRepository(Menu::class)->findBy([], ['rang' => 'asc']);
        $menu = $this->show_menu($ugi,null, 0, $menus);
        return $this->render('menu_dynamic/index.html.twig', [
            'menu' => $menu
        ]);
    }

    public function show_menu($ugi,$parentId, $niveau, &$menus)
    {
        $html = "";
        $niveau_precedent = 0;
        if ($niveau_precedent == 0 && $niveau == 0) {
            $html .= "<ul class='nav-list'>";
        }
        foreach ($menus as $key => $menu) {
            $id = $menu->getId();
            $libelle = $menu->getLibelle();
            $rang = $menu->getRang();
            $url = $menu->getUrl();
            try {
                $href = $ugi->generate($url);
            } catch (\Throwable $th) {
                $href = $url;
            }
            $icon = $menu->getIcon();
            $icon = ($icon) ? "<i class='$icon'></i>" : "";
            $role = $menu->getRole();
            $authorisation = false;
            if ($this->isGranted($role) || $role == 'ROLE_USER') {
                $authorisation = true;
            }
            $parentMenuId = $menu->getParent();
            $subMenus = $menu->getMenus();
            $nbreSubMenus = count($subMenus);
            if ($parentId == $parentMenuId && $authorisation) {
                if ($niveau_precedent < $niveau) {
                    $html .= "<ul class='sub-menu'>";
                }
                if ($nbreSubMenus != 0) {
                    $html .= "<li><a href='$href'>$libelle</a>";
                } else {
                    $html .= "<li><a href='$href'>$icon $libelle</a>";
                }
                $niveau_precedent = $niveau;
                foreach ($subMenus as $subMenu) {
                    $subMenuId = $subMenu->getId();
                    $html .= $this->show_menu($ugi,$menu, $niveau + 1, $menus);
                }
                unset($menus[$key]); // Remove the processed menu
            }
        }
        if ($niveau_precedent == 0 && $niveau == 0) {
            $html .= "</ul>";
        } elseif ($niveau_precedent == $niveau) {
            $html .= "</ul></li>";
        } else {
            $html .= "</li>";
        }
        return $html;
    }
}
