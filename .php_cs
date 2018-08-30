<?php

$header = <<<EOF
(c) Jérémy Marodon <marodon.jeremy@gmail.com>
For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => true,
        'class_keyword_remove' => true,
    ])
    ->setFinder($finder)
;
