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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContactController extends Controller{


    /**
     * @Route("/newContact/", name="newContact")
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

            return $this->redirectToRoute('showAllContact');
        }
        return  ['form' => $form->createView()];
    }

    /**
     * @Route("/editContact/{id}/", name="editContact")
     *
     * Edytowanie kontaktu i zapis danych do 3 encji.
     *
     */
    public function editUserAction(Request $request, $id)  {

        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository('ContactBoxBundle:Contact')->findOneBy(['id'=>$id]);

        //wczytanie, jeśli istnieją:
        if (count($contact->getAddress()) == 0) {
            $contact->addAddress( new Address() );
        }

        if (count($contact->getPhone()) == 0) {
            $contact->addPhone( new Phone() );
        }

        if (count($contact->getEmail()) == 0) {
            $contact->addEmail( new Email() );
        }

        $form = $this->createForm(contactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $form_data = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->persist($form_data);

            foreach ($form_data->getEmail() as $email) {
                $email->setContact($form_data);
                $em->persist($email);
            }

            foreach ($form_data->getAddress() as $address) {
                $address->setContact($form_data);
                $em->persist($address);
            }

            foreach ($form_data->getPhone() as $phone) {
                $phone->setContact($form_data);
                $em->persist($phone);
            }

            $em->flush();

            return $this->redirectToRoute('detailsContact',['id'=>$id]);

        }

        return $this->render('@ContactBox/Views/Form/editContactForm.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/AllContact/", name="showAllContact")
     * @Template("@ContactBox/Views/Web/showAllContact.html.twig")
     *
     *
     *
     */
    public function showAllContactAction()  {

        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('ContactBoxBundle:Contact');

        $contacts = $repository->findAll();

        return ['contacts'=>$contacts];
    }

    /**
     * @Route("/detailsContact/{id}", name="detailsContact")
     * @Template("@ContactBox/Views/Web/detailsContact.html.twig")
     *
     *
     *
     */
    public function detailsContactAction($id)  {

        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('ContactBoxBundle:Address');

        $address = $repository->findOneByContact($id);

        $repository = $em->getRepository('ContactBoxBundle:Email');

        $email = $repository->findOneByContact($id);

        $repository = $em->getRepository('ContactBoxBundle:Phone');

        $phone = $repository->findOneByContact($id);

        $repository = $em->getRepository('ContactBoxBundle:Contact');

        $contacts = $repository->find($id);


        return ['address'=>$address ,
                'email'=>$email ,
                'phone'=>$phone ,
                'contact'=>$contacts];
    }

    /**
     * @Route("/removeContact/{id}", methods={"POST"} , name="removeContact")
     * @Template("@ContactBox/Views/Web/removeContactAdd.html.twig")
     *
     */
    public function removeContactAction($id)  {

        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('ContactBoxBundle:Contact')->find($id);

        $repository = $em->getRepository('ContactBoxBundle:Address');

        $address = $repository->findOneByContact($id);

        $repository = $em->getRepository('ContactBoxBundle:Email');

        $email = $repository->findOneByContact($id);

        $repository = $em->getRepository('ContactBoxBundle:Phone');

        $phone = $repository->findOneByContact($id);

        if($address) {
            $em->remove($address);
        }

        if($email) {
            $em->remove($email);
        }

        if($phone) {
            $em->remove($phone);
        }

        $em->remove($contacts);

        $em->flush();

        return ;

    }

}
