<?php

namespace App\Form;

use App\Entity\FtpServer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FtpServerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'help' => 'Readable server name'
            ])
            ->add('ip', null, [
                'label' => 'Ip or host',
                'help'  => 'Server ip address or host name'
            ])
            ->add('port')
            ->add('username', TextType::class, [])
            ->add('password', PasswordType::class)
            ->add('path', TextType::class, [
                'help' => 'Path from server root to configurations folder (cfg)',
                'data' => !$builder->getData() ? '/' : $builder->getData()->getPath()
            ])
            ->add('useSsl', null, [
                'help'     => 'Check if ftp server using ssl',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FtpServer::class,
        ]);
    }
}
