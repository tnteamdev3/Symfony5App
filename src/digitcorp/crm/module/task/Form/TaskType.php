<?php

namespace App\digitcorp\crm\module\task\Form;

use App\digitcorp\crm\module\task\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MessageTypeEnum;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_task')
            ->add('description')
          
             ->add('status', ChoiceType::class, [
         'choices'  => [
        'Not Started Yet' =>  'Not Started Yet',
        'In Process' => 'In Process',
        'Done' => 'Done' ,
    ],
])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
