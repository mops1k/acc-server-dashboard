<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\RangeType;

/**
 * Class CustomRangeType
 */
class CustomRangeType extends RangeType
{
    public function getBlockPrefix()
    {
        return 'custom_range';
    }
}
