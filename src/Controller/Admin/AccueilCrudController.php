<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accueil::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image')->setUploadDir("public/uploads")
                                    ->setBasePath("uploads")
                                    ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            TextEditorField::new('content', 'Présentation')->formatValue(function ($value) { return $value; }),
        ];
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions
        // this will forbid to create or delete entities in the backend
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ->disable(Action::NEW, Action::DELETE)
    ;
}
    
}
