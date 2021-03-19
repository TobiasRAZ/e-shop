<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType
{
    /**
     * Get basic form configurations.
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    public function getConfiguration($label, $placeholder, $options = []): array
    {
        return array_merge_recursive([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }
}