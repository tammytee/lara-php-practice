<?php

namespace App;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CspPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this
            ->addDirective(Directive::FONT, 'fonts.bunny.net')
            ->addDirective(Directive::STYLE, 'fonts.bunny.net');
    }
}
