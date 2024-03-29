<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class ProduitsCrudController extends AbstractCrudController
{
    private $params;

    public function __construct(ParameterBagInterface $params)

    {
        $this->params =$params;
    }
    public static function getEntityFqcn(): string
    {
        return Produits::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('smallCategory'),
            TextField::new('titre'),
            TextField::new('taille'),
            NumberField::new('poids'),
            TextareaField::new('description'),
            NumberField::new('stock'),
            NumberField::new('carats'),
            TextField::new('couleur'),
            NumberField::new('prix'),
            TextField::new('nom'),
            ImageField::new('picture')
            ->setUploadDir('public/images/produit')
            ->setBasePath($this->params->get('app.path.produit_images'))
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setRequired(false),
            // ImageField::new('picture')
            // ->setUploadDir('public/images/articles')
            // ->setBasePath($this->params->get('app.path.article_images'))
            // ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            // ->setRequired(false),
        ];
    }
    
}
