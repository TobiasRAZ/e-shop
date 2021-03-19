<?php

namespace App\Controller\FrontOffice;

use App\Constant\MessageConstant;
use App\Entity\User;
use App\Form\RegistrationType;
use App\Controller\BaseController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarExporter\Internal\Registry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends BaseController
{
    private UserPasswordEncoderInterface $passwordEncoder;
    
    /**
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        parent::__construct($em);
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/register", name="app_register")
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
            if ($this->save($user)) {
                $this->addFlash(
                    MessageConstant::SUCCESS_TYPE,
                    "Account created successfully !"
                );
                // return $this->redirectToRoute('app_login');
            }
        }
        return $this->render('front_office/auth/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}