<?php

namespace ContactBoxBundle\Controller;

use ContactBoxBundle\Entity\Address;
use ContactBoxBundle\Entity\Email;
use ContactBoxBundle\Entity\Phone;
use ContactBoxBundle\Form\newContactForm;
use ContactBoxBundle\Form\Type\contactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ContactBoxBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContactController extends Controller{


    /**
     * @Route("/newContact1/", name="newContact")
     * @Template("@ContactBox/Views/Form/newContactForm.html.twig")
     *
     * Dodawanie nowego kontaktu do skrzynki kontaktowej
     *
     */
    public function newContactAction(Request $request)  {

        $contact = new Contact();

        $form = $this->createForm(newContactForm::class,$contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($contact);

            $em->flush();

            return $this->render('@ContactBox/Views/Web/successContactAdd.html.twig');
        }
        return  ['form' => $form->createView()];
    }


    /**
     * @Route("/editContact/{id}/", name="editContact")
     *
     * Edytowanie kontaktu i zapis danych do 3 encji.
     *
     */
    public function editUserAction(Request $request,$id)  {

        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository('ContactBoxBundle:Contact')->findOneBy(['id'=>$id]);

        //  $adress=$contact->getAdress();


        //      $adress=$contact->getAdress();

//        $address = new Address();
//
//
//        $contact->addAddress($address);


        //      $email=$contact->getEmails();

        //   if(!$email){

        $email= new Email();

        $contact->addEmail($email);

        // }

        //    $phone=$contact->getPhone();

        //      if(!$phone){

//        $phone= new Phone();
//
//        $contact->addPhone($phone);
//        //   }



        $form = $this->createForm(contactType::class,$contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//            $address= $form->getData();
//
//            $address->setContact($contact);

            $email= $form->getData();

            $email->setContact($contact);

//            $phone= $form->getData();
//
//            $phone->setContact($contact);


//            $address->setUser($contact);
//
//            $email=$form->getData();
//
//            $email->setUser($contact);
//
//            $phone=$form->getData();
//
//            $phone->setUser($contact);

            $em = $this->getDoctrine()->getManager();

         //   $em->persist($address);

            $em->persist($email);

          $em->persist($contact);

       //     $em->persist($phone);

            $em->flush();


            new Response('Zapisany!');
        }

        return $this->render('@ContactBox/Views/Form/editContactForm.twig', ['form' => $form->createView()]);
    }









}
