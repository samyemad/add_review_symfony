<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\ReviewConstruction\ReviewConstructionItem;
use App\Entity\Review\ReviewItem;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class ReviewItemType extends AbstractType
{

    private $typeInnerDrectory=__NAMESPACE__ . '\\Types\\';


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reviewConstruction',EntityType::class, [
                    'class' => ReviewConstructionItem::class,
                    'multiple' => false,
                    'choice_value' => 'id'
                ]
            );
        $formModifier = function (FormInterface $form, ReviewConstructionItem $reviewConstructionItem = null) {
           if($reviewConstructionItem != null && $reviewConstructionItem->getReviewConstructionItemType())
           {
               $type=ucfirst($reviewConstructionItem->getReviewConstructionItemType()->getName());
               $classType = $this->typeInnerDrectory . $type.'InnerType';
               $row=$classType::fetch();
               $form->add('result', $row['type'], $row['options']);
           }

        };
        $builder->get('reviewConstruction')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $reviewConstructionItem = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $reviewConstructionItem);
            }
        );
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ReviewItem::class,
            'csrf_protection' => false,
        ));
    }
}