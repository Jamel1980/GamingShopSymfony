<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Role;
use App\Form\MenuType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(EntityManagerInterface $em): Response
    {
        $menus = $em->getRepository(Menu::class)->findBy([], ['rang' => 'asc']);
        $menu = $this->list_menu(null, 0, $menus);

        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
            'menu' => $menu,

        ]);
    }

    public function list_menu($parentId, $niveau, $menus)
    {
        $html = "";
        foreach ($menus as $menu) {
            $id = $menu->getId();
            $rang = $menu->getRang();
            $libelle = $menu->getLibelle();
            $url = $menu->getUrl();
            $icon = $menu->getIcon();
            $icon = "<i class = '$icon'></i>";
            $role = $menu->getRole();
            $parentMenuId = $menu->getParent();
            if ($parentId == $parentMenuId) { // in jeux true
                $point = "";
                for ($i = 1; $i <= $niveau; $i++) { // for jeux its false default niveau = 0 so 1<=0 false
                    $point = "......";
                }
                $class = ($niveau == 0) ? "fw-bold" : ""; // for jeux its true because niveau = 0;
                $html .= "<tr class = '$class'>";
                $html .= "<td><div class='content'>
                <label class='checkBox'>
                  <input id='ch1 $id' value='$id' name='check' onClick='onlyOne(this )' type='checkbox'>
                  <div class='transition'></div>
                </label>
              </div></td>";
                $html .= "<td>$point $libelle</td>";
                $html .= "<td>$url</td>";
                $html .= "<td>$icon</td>";
                $html .= "<td>$role</td>";
                $html .= $this->list_menu($menu, $niveau + 1, $menus);
            }
        }
        return $html;
    }

    #[Route('/menu/show/{id}', name: 'app_menu_show')]
    public function show(EntityManagerInterface $em, $id)
    {
        $menu = $em->getRepository(Menu::class)->find($id);
        $roles = $em->getRepository(Role::class)->findAll();
        return $this->render('menu/show.html.twig', [
            'menu' => $menu,
            'roles' => $roles,
        ]);
    }

    #[Route('/menu/modify/{id}', name: 'app_menu_modify')]
    public function modify(EntityManagerInterface $em, Request $request, $id)
    {
        $id = (int) $id;
        if ($id == 0) {
            $menu = new Menu();
        } else {
            $menu = $em->getRepository(Menu::class)->find($id);
        }
        $form = $this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($menu);
            $em->flush();
            return $this->redirectToRoute('app_menu');
        }
        return $this->render('menu/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('menu/delete/{id}', name: 'app_menu_delete')]
    public function delete(EntityManagerInterface $em, $id)
    {
        $menu = $em->getRepository(Menu::class)->find($id);
        $em->remove($menu);
        $em->flush();
        return $this->redirectToRoute('app_menu');
    }
}
