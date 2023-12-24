<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\EntityCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class EvenementCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        setlocale(LC_TIME, 'fr_FR'); // Set French locale
        return [
            DateField::new('toDate', 'To Date'),
            TextField::new('title', 'Titre'),
            TextField::new('start', 'Start'),
                  
        ];
    }
    
}
