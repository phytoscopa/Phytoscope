<?php
// src/Phytoscope/AppBundle/Admin/QuestionnaireAdmin.php

namespace Phytoscope\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Phytoscope\AppBundle\Entity\Questionnaire;

class QuestionnaireAdmin extends Admin{
    
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('client.nom', 'client')
            ->add('qBotaniste')
            ->add('qNbBotaniste')
        ;
    }

    // Linked with the ClientsAdmin
    public function getParentAssociationMapping()
    {
        return 'Clients';
    }

}