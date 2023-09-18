<?php

namespace App\Controller\Admin;

use App\Entity\SmallCategories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SmallCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SmallCategories::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('description')->setRequired(false),
            AssociationField::new('category')
        ];
    }
    
}
