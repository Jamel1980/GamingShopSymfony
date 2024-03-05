<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hash): Response
    {
        $allRoles = $entityManager->getRepository(Role::class)->findAll();
        $roles = [];
        foreach ($allRoles as $role) {
            $nom_role = $role->getNomRole();
            $roles[$nom_role] = $nom_role;
        }
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('roles', ChoiceType::class, [
            'choices' => $roles,
            'multiple' => true,
            'attr' => ['class' => 'form-control']
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            if ($plainPassword) {
                //? hassPassword takes 2 parameter . 1/user entity and 2/plain password
                $password = $hash->hashPassword($user, $plainPassword);
                //setPassword is method in User entity to set the password inside database.
                $user->setPassword($password);
            }
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hash): Response
    {
        //here we got all the list of role 
        $allRoles = $entityManager->getRepository(Role::class)->findAll();
        $roles = [];
        foreach ($allRoles as $role) {
            $nom_role = $role->getNomRole();
            $roles[$nom_role] = $nom_role;
        }
        $form = $this->createForm(UserType::class, $user);
        //here we added roles to form since there was no field in form.
        $form->add('roles', ChoiceType::class, [
            'choices' => $roles,
            'multiple' => true,
            'attr' => ['class' => 'form-control']
        ]);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //!When user register then password will be hashed but here we are modifying,creating user as admin so password is not hased. Therefore we need to use method to hash password.
            //todo here $form is the instance of form class which is inside Vendor and getData is method inside this class.
            //todo so when user enter password in field then this method below capture the password and stores it inside $plainPassword.
            //? so here get('plainPassword') will only retrieves form field but not data. 
            //? So now when user enters data in this form field then getData will retrieve the actual data user has entered and store it in $plainPassword variable.
            $plainPassword = $form->get('plainPassword')->getData();
            if (!$plainPassword) {
                //? hassPassword takes 2 parameter . 1/user entity and 2/plain password
                $password = $hash->hashPassword($user, $plainPassword);
                //setPassword is method in User entity to set the password inside database.
                $user->setPassword($password);
            }
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return  $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
