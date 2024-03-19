<?php

namespace CustomBundle\Lib\AttributeFormer;

use App\Entity\Person;

/* 
 * This one looks up in places for forms handling attributes.
 * This is so the users can "edit" attributes in an easier way.
 * Plan once was jsonschema, but I'll do it simpler for now.
 *
 * Anyway, bo going through this service the underlying way to handle it all
 * can be changed without too much hassle.
 */
class AttributeFormer
{
    private $form_factory;

    public function __construct($form_factory)
    {
        $this->form_factory = $form_factory;
    }

    /*
     * Tailoring i spades. Make flexible and prettier if it's needed later.
     */
    public function getForms($frog)
    {
        $forms = [];
        if ($frog instanceOf Person) {
            $forms[] = $this->form_factory->create(\CustomBundle\Form\Attributes\PersonType::class);
        }
        return $forms;
    }
}
