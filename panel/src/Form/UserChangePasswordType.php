<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserChangePasswordType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('plainPassword', RepeatedType::class, array(
				'type' => PasswordType::class,
				'first_options'  => array('label' => 'Nueva Contraseña'),
				'second_options' => array('label' => 'Repetir nueva contraseña'),
				'constraints' => [
					new NotBlank(),
					new Length(['min' => 5]),
				]
			))
			->add('remember', SubmitType::class,[
				'label' => 'Save'
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{

	}
}