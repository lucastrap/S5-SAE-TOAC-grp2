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
use EasyCorp\Bundle\EasyAdminBundle\Field\FormColumns;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CourseCrudController extends AbstractCrudController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPaginatorPageSize(5); // Configuration de la taille de la pagination à 5 éléments par page
         
    }
    public static function getEntityFqcn(): string
    {
        
        return Course::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            
        FormField::addTab('Course')->setIcon('fa fa-running'),
            UrlField::new('image', 'Lien de l\'image(url)'),
            TextField::new('titre', 'Titre'),
            TextField::new('format', 'Format'),
            NumberField::new('prix', 'Prix'),
            TextField::new('challenge', 'Challenge'),
            AssociationField::new('courseCategory', 'Catégorie'),
            
        FormField::addTab('Info')->setIcon('fa fa-info-circle'),
            TextField::new('specificites', 'Specificites'),
            TextField::new('catAge', 'Categories d\'âges'),
            DateTimeField::new('clotInscr', 'Clôture des inscriptions'),
            
        FormField::addTab('Horaires')->setIcon('fa fa-clock'),
            TextField::new('jour', 'Jour de la course'),
            TextField::new('horaires', 'Details sur les horaires'),
            TextField::new('horaires2', 'Départs des courses'),
            
        FormField::addTab('Tarifs')->setIcon('fa fa-money'),
            NumberField::new('individuel', 'Prix individuel de la course'),
            TextField::new('detailNonL', 'Détails pour les non licenciés'),
            NumberField::new('relais', 'Prix relais de la course')->setRequired(false),
            TextField::new('detailNonLR', 'Détails pour les non licenciés')->setRequired(false),
            NumberField::new('duo', 'Prix duo de la course')->setRequired(false),
            TextField::new('detailNonLD', 'Détails pour les non licenciés')->setRequired(false),
           
        FormField::addTab('Trajets')->setIcon('fa fa-map'),
        UrlField::new('openRunner', 'lien du OpenRunner(url)'),
        UrlField::new('mapRace', 'Lien du trajet de la course(url)'),
        UrlField::new('mapRace2', 'Autre lien de trajet(url)')->setRequired(false),
        UrlField::new('mapRace3', 'Autre lien de trajet(url)')->setRequired(false),
            
            
        FormField::addTab('Assurance')->setIcon('fa fa-shield'),
            NumberField::new('prixAss', 'Prix de l\'assurance'),
      ];
    }


   
}
