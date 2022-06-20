<?php

namespace App\Controller\Admin;

use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ConferenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conference::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Conference')
            ->setSearchFields(['city', 'year', 'is_international'])
            ->setDefaultSort(['city' => 'ASC'])
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('city')
        ;
    }

    public function configureFields(string $pageName): iterable
    {   
        yield TextField::new('City');
        yield TextField::new('Year');
        yield BooleanField::new('isInternational');
    }
}
