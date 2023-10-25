<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use App\Entity\CourseCategory;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Collection\EntityCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CourseCrudController extends AbstractCrudController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getEntityFqcn(): string
    {
        return Course::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('image', 'Image'),
            TextField::new('titre', 'Titre'),
            TextField::new('format', 'Format'),
            NumberField::new('prix', 'Prix'),
            TextField::new('challenge', 'Challenge'),
//            EntityCollection::new([CourseCategory::class])
            AssociationField::new('courseCategory', 'Catégorie'),
            TextField::new('specificites', 'Specificites'),
            TextField::new('catAge', 'Categories d\'âges'),
            DateTimeField::new('clotInscr', 'Clôture des inscriptions'),
            TextField::new('jour', 'Jour de la course'),
            TextField::new('horaires', 'Details sur les horaires'),
            TextField::new('horaires2', 'Départs des courses'),
            NumberField::new('individuel', 'Prix individuel de la course'),
            TextField::new('detailNonL', 'Détails pour les non licenciés'),
            NumberField::new('relais', 'Prix relais de la course'),
            TextField::new('detailNonLR', 'Détails pour les non licenciés'),
            NumberField::new('duo', 'Prix duo de la course'),
            TextField::new('detailNonLD', 'Détails pour les non licenciés'),
           
            //Faire en sorte de choisir 3 catégories ou 2
          ];
    }
}
