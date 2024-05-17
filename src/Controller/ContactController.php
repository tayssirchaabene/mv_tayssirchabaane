<?php


namespace App\Controller;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact_form')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact(); 
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($contact->getemail())
                ->to('recipient@example.com')
                ->subject($contact->getsubject())
                ->text($contact->getmessage());

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !'. $contact->getname());

            return $this->redirectToRoute('contact_form');
        }

        return $this->render('home/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}
