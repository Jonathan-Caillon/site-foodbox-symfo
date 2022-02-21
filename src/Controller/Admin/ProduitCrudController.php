<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField
;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('produitCategorie', 'Catégorie'),
            TextEditorField::new('content')->formatValue(function ($value) { return $value; }),
            MoneyField::new('price')->setCurrency('EUR'),
            ImageField::new('image')->setUploadDir("public/uploads")
                                    ->setBasePath("uploads")
                                    ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
        ];
    }
    
}
