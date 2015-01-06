<?php
// src/Phytoscope/AppBundle/Admin/ClientsAdmin.php

namespace Phytoscope\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Phytoscope\AppBundle\Entity\Clients;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ClientsAdmin extends Admin{

	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('type', 'choice', array('choices' => Clients::getListeClients(), 'label' => 'Type'))
            ->add('nom', 'text', array('label' => 'Nom'))
            ->add('agence', 'text', array('required' => false, 'label' => 'Agence'))
            ->add('departement', 'integer', array('label' => 'Département'))
            ->add('ville', 'text', array('required' => false, 'label' => 'Ville'))
            ->add('cp', 'text', array('required' => false, 'label' => 'Code postal'))
            ->add('adresse', 'text', array('required' => false, 'label' => 'Adresse'))
            ->add('telephone', 'text', array('required' => false, 'label' => 'Téléphone'))
            ->add('mail', 'text', array('required' => false, 'label' => 'Mail'))
            ->add('commentaire', 'sonata_formatter_type', array(
                  'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                  'format_field'   => 'commentaire',
                  'source_field' => 'commentaireRaw',
                  'source_field_options' => array(
                    'attr' => array('class' => 'span10', 'rows' => 5)
                  ),
                  'listener' => true,
                  'target_field' => 'commentaire',
                  'ckeditor_toolbar_icons' => array(
                    1 => array('Bold', 'Italic', 'Underline',
                        '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord',
                        '-', 'Undo', 'Redo',
                        '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent',
                        '-', 'Blockquote',
                        '-', 'Link', 'Unlink', 'Table'),
                    2 => array('Maximize', 'Source')
                  )
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('departement')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('departement')
            ->add('ville')
            ->add('filledQuestionnaire', 'boolean', array('label' => 'Questionnaire complété'))
            ->add('slug')
        ;
    }

}