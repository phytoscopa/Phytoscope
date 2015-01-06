<?php

namespace Phytoscope\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Phytoscope\AppBundle\Entity\Questionnaire;
use Symfony\Component\HttpFoundation\Request;
use Phytoscope\AppBundle\Form\Type\QuestionnaireType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Phytoscope\AppBundle\Entity\Clients;

class DefaultController extends Controller
{
    public function homepageAction()
    {
        return $this->render('PhytoscopeAppBundle:Default:index.html.twig');
    }

    /**
    * @ParamConverter("client", options={"mapping": {"slug_client": "slug"}})
    */ 
    public function presentationAction(Clients $client)
    {
        return $this->render('PhytoscopeAppBundle:Presentation:presentation.html.twig', array(
        	'client' => $client,
        	));

    }

    /**
    * @ParamConverter("client", options={"mapping": {"slug_client": "slug"}})
    */ 
    public function questionnaireAction(Request $request, Clients $client)
    {
    	// Si le questionnaire a déjà été rempli, on redirige vers la page de présentation
    	if (null !== $client->getQuestionnaire()){
    		return $this->redirect($this->generateUrl('phytoscope_app_presentation', array(
    			'slug_client' => $client->getSlug(),
    			)));
    	} else {
	    	$questionnaire = new Questionnaire();
			$client->setQuestionnaire($questionnaire);
	        $form = $this->createForm(new QuestionnaireType($client), $client->getQuestionnaire());
	        $form->handleRequest($request);

	        if ($form->isValid()) {
	        	$em = $this->getDoctrine()->getManager();
				$em->persist($client);
				$em->flush();

				$request->getSession()->getFlashBag()->add('notice', 'Questionnaire validé');

				// Envoie mail confirmation
				$message = \Swift_Message::newInstance()
					->setSubject('Merci d\'avoir répondu à notre questionnaire')
					->setFrom(array('info@phytoscopa.com'))
					->setTo($client->getMail())
					->setBody($this->renderView('PhytoscopeAppBundle:Mail:confirmationQuestionniare.html.twig', array('client' => $client)))
					->setContentType('text/html')
					->setCharset('UTF-8')
				;
				$this->get('mailer')->send($message);
				return $this->redirect($this->generateUrl("phytoscope_app_homepage"));
			}

			return $this->render('PhytoscopeAppBundle:Questionnaire:questionnaire.html.twig', array(
			            'form' => $form->createView(),
			            'client' => $client,
			        	));
		}	
    }

    public function beAction()
    {

    }

}
