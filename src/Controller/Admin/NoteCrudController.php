<?php

namespace App\Controller\Admin;
use App\Entity\Note;
use APP\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\DomCrawler\Field\FormField;

class NoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Note::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title')
            ->setHelp('Nom de la note'),
            TextEditorField::new('content')
            ->setHelp('Contenu de la Note'),
        ];
    }
    
}
