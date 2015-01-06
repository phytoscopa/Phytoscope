<?php
// src/Phytoscope/AppBindle/Form/Type/QuestionnaireType.php

namespace Phytoscope\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Phytoscope\AppBundle\Entity\Questionnaire;
use Phytoscope\AppBundle\Entity\Personne;
use Phytoscope\AppBundle\Entity\Clients;

class QuestionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('qBotaniste', 'choice', array(
        					'choices' => array(true => 'Oui', false => 'Non'),
        		))
		        ->add('qNbBotanistes', 'choice', array(
		            		'choices' => Questionnaire::getListeValeursBotanistes(),
		            		'label' => 'Si oui, pourriez-vous nous donner une estimation ?',
                            'required' => false))
		        ->add('Valider', 'submit')
                ->add('Personnes', 'collection', array('type' => new PersonneType(),
                    'allow_add' => true,
                    'allow_delete' => false))
        ;
    }

    public function getName()
    {
        return 'questionnaire';
    }

    public function __construct(Clients $client)
    {
        $this->client = $client;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'Phytoscope\AppBundle\Entity\Questionnaire',
	    ));
	}
}