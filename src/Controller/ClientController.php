<?php
//! here clientController is for user dashboard
namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]


    public function index(ClientRepository $cr, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $client = $em->getRepository(Client::class)->findOneBy(['user' => $user]);
        $photo = $client->getPhoto();
        return $this->render('client/index.html.twig', [
            'client' => $client, // Pass the client to the template
            'user' => $user,
            'photo' => $photo,
        ]);
    }
    #[Route('/client/edit-photo', name: 'app_client_edit_photo')]
    //! this function edit is using method without creating form object. So method is bit different.

    public function edit(Request $request, ClientRepository $clientRepository, EntityManagerInterface $em, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = $this->getUser(); // Get the logged-in user

        $client = $clientRepository->findOneBy(['user' => $user]); // Get the client associated with the user

        if ($request->isMethod('POST')) {
            // Handle the form submission
            $form = $request->request->all();
            //! Method creating form object
            // $form = $this->createForm(ClientType::class, $client);
            // $form->handleRequest($request);
            // if ($form->isSubmitted() && $form->isValid()) {
            //     $nom = $form->get('nom')->getData();
            //     $client->setNom($nom);
            //     $prenom = $form->get('prenom')->getData();
            //     $client->setPrenom($prenom);
            //     $email = $form->get('email')->getData();
            //     $client->getUser()->setEmail($email);
            //     $plainPassword = $form->get('plainPassword')->getData();
            //     if (!empty($plainPassword)) {
            //         $encodedPassword = $passwordEncoder->hashPassword($client->getUser(), $plainPassword);
            //         $client->getUser()->setPassword($encodedPassword);
            //     }
            // }
            // Validate the form data
            // ...
            //!method without creating form object
            // Update the client's information
            $client->setNom($form['nom']);
            $client->setPrenom($form['prenom']);
            $client->getUser()->setEmail($form['email']);
            //!only using this will update the user detail but since passsword field is empty then it will update that empty password aswell. 
            // $client->getUser()->setPassword($form['password']);

            //! here we have direct access to $form['plainPassword'] becuase we have not created form instead in top we used  $form = $request->request->all();
            if (!empty($form['plainPassword'])) {
                $plainPassword = $form['plainPassword'];
                $encodedPassword = $passwordEncoder->hashPassword($client->getUser(), $plainPassword);
                $client->getUser()->setPassword($encodedPassword);
            }
            //todo Handle the uploaded photo
            $photo = $request->files->get('photo');
            if ($photo) {
                $originalFilename = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $photo->guessExtension();
                
                try {
                    $photo->move(
                        $this->getParameter('upload_directory'), // This should be defined in your config/services.yaml file
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception if something happens during file upload
                }

                $client->setPhoto($newFilename);
            }

            // Save the changes to the database
            $em->persist($client);
            $em->flush();

            // Redirect the user to a success page
            return $this->redirectToRoute('app_client_success');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client, // Pass the client to the template
        ]);
    }
}
