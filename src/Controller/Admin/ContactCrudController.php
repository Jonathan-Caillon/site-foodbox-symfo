<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

            TextEditorField::new('horaire')->formatValue(function ($value) { return $value; }),
            TextEditorField::new('tel', 'Téléphone')->formatValue(function ($value) { return $value; }),
            TextEditorField::new('adresse')->formatValue(function ($value) { return $value; }),
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
