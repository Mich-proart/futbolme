<?php

namespace App\Form;

use App\Entity\Comunidad;
use App\Entity\Division;
use App\Entity\Equipos;
use App\Entity\Noticias;
use App\Entity\Partido;
use App\Entity\Temporada;
use App\Entity\User;
use App\Repository\PartidoRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoticiasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $partidosValues = array_key_exists('partidos', $options) ? $options['partidos'] : [];
        $equiposValues = array_key_exists('equipos', $options) ? $options['equipos'] : [];

        $builder
            ->add('titulo')
            ->add('descripcionCorta', TextareaType::class)
            ->add('descripcion', TextareaType::class)
            ->add('fecha',DateTimeType::class,[
                'required' => false,
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'autocomplete' => 'off'
                ],
                'empty_data' => '',
            ])
            #->add('estado')
            ->add('usuario', EntityType::class, [
                'class' => User::class,
                'placeholder' => 'Selecciona un redactor',
                'required' => true,
                'label' => 'Redactor',
                #'choices' => $options['usuaris'],
                'choice_label' => function (User $user) {
                    return $user->getUsername();
                },
                'choice_value' => function (?User $user) {
                    return $user ? $user->getId() : null;
                },
                #'data' => $options['usuaris'][0]
            ])
            ->add('temporada', EntityType::class, [
                'class' => Temporada::class,
                'placeholder' => 'Selecciona temporadas',
                'required' => false,
                'label' => 'Temporada',
                'multiple' => true,
                'choice_label' => function ($temporada) {
                    if (method_exists($temporada, 'getNombre')) {
                        return $temporada->getNombre();
                    }
                    return null;

                },
                'choice_value' => function ($temporada) {
                    if (method_exists($temporada, 'getId')) {
                        return $temporada->getId();
                    }
                    return null;
                },
            ])
            ->add('partido', EntityType::class, [
                'class' => Partido::class,
                'placeholder' => 'Selecciona partidos',
                'required' => false,
                'label' => 'Partidos',
                'multiple' => true,
                'choices' => $partidosValues,
                'choice_label' => function ($partido) {
                    return 'J' . $partido->getJornada() . ' - ' . $partido->getEquipoLocal()->getNombre() . ' - ' . $partido->getEquipoVisitante()->getNombre() . '(' . $partido->getFecha()->format('d/m/Y') . ')';
                    /*
                    if (is_array($partido)) {
                        if (array_key_exists('nombrePartido', $partido)) {
                            return $partido['nombrePartido'];
                        }
                    }
                    return null;
                    */
                },
                'choice_value' => function ($partido) {
                    #dump($partido);
                    return $partido->getId();
                    /*
                    dump($partido);
                    if (is_array($partido)) {
                        if (array_key_exists('id', $partido)) {
                            return $partido['id'];
                        }
                    }
                    return null;
                    */
                },
            ])
            ->add('equipos', EntityType::class, [
                'class' => Equipos::class,
                'placeholder' => 'Selecciona equipos',
                'required' => false,
                'label' => 'Equipos',
                'multiple' => true,
                'choices' => $equiposValues,
                'choice_label' => function ($equipo) {
                    if (method_exists($equipo, 'getNombre')) {
                        return $equipo->getNombre();
                    }
                    return null;

                },
                'choice_value' => function ($equipo) {
                    if (method_exists($equipo, 'getId')) {
                        return $equipo->getId();
                    }
                    return null;
                },
            ])
            ->add('temporada', EntityType::class, [
                'class' => Temporada::class,
                'placeholder' => 'Selecciona temporadas',
                'required' => false,
                'label' => 'Temporada',
                'multiple' => true,
                'choice_label' => function ($temporada) {
                    if (method_exists($temporada, 'getNombre')) {
                        return $temporada->getNombre();
                    }
                    return null;

                },
                'choice_value' => function ($temporada) {
                    if (method_exists($temporada, 'getId')) {
                        return $temporada->getId();
                    }
                    return null;
                },
            ])
            /*
            ->add('partido', EntityType::class, [
                'class' => Partido::class,
            ])
            */
            /*
            ->add('equipos')
            */
            ->add('comunidad', EntityType::class, [
                'class' => Comunidad::class,
                'placeholder' => 'Selecciona comunidades',
                'required' => false,
                'label' => 'Comunidades',
                'multiple' => true,
                #'choices' => $options['usuaris'],
                'choice_label' => function ($comunidad) {
                    if (method_exists($comunidad, 'getNombre')) {
                        return $comunidad->getNombre();
                    }
                    return null;
                },
                'choice_value' => function ($comunidad) {
                    if (method_exists($comunidad, 'getId')) {
                        return $comunidad->getId();
                    }
                    return null;
                },
                #'data' => $options['usuaris'][0]
            ])
            ->add('division', EntityType::class, [
                'class' => Division::class,
                'placeholder' => 'Selecciona divisiones',
                'required' => false,
                'label' => 'Divisiones',
                'multiple' => true,
                #'choices' => $options['usuaris'],
                'choice_label' => function ($division) {
                    if (method_exists($division, 'getNombre')) {
                        return $division->getNombre();
                    }
                    return null;
                },
                'choice_value' => function ($division) {
                    if (method_exists($division, 'getId')) {
                        return $division->getId();
                    }
                    return null;
                },
                #'data' => $options['usuaris'][0]
            ])
            ->add('posicion', ChoiceType::class, [
                'choices'  => [
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Noticias::class,
            'partidos' => [],
            'equipos' => [],
        ]);

        $resolver->setAllowedTypes('partidos', 'array');
        $resolver->setAllowedTypes('equipos', 'array');
    }
}
