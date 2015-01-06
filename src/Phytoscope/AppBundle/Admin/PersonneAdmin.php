<?php

namespace Phytoscope\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Phytoscope\AppBundle\Entity\Personne;

class PersonneAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('client')
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('newsletter')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('newsletter', 'boolean')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    // Formulaire d'ajout
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('client')
            ->add('titre')
            ->add('nom')
            ->add('prenom')
            ->add('fonction')
            ->add('telFixe')
            ->add('telPortable')
            ->add('mail')
            ->add('newsletter')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    // ?
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('client')
            ->add('titre')
            ->add('nom')
            ->add('prenom')
            ->add('telFixe')
            ->add('telPortable')
            ->add('mail')
            ->add('fonction')
        ;
    }
}
