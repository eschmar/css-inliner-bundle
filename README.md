# CssInlinerBundle
Simple twig css inliner for Symfony2 using [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles).

# Installation
Composer (<a href="https://packagist.org/packages/eschmar/css-inliner-bundle" target="_blank">Packagist</a>):
```json
"require": {
    "eschmar/css-inliner-bundle": "dev-master"
},
```

app/Appkernel.php:
```php
new Eschmar\CssInlinerBundle\EschmarCssInlinerBundle(),
```

# Usage
This bundle introduces a new tag to twig:

````html
{% cssinline %}
    <style>
        p {
            padding: 8px 15px;
            color: #8E2800;
            background-color: #FFB03B;
        }
    </style>
    <p>Bananaaa!</p>
{% endcssinline %}
```

Which inlines all ``<script>`` tags and strips them out afterwards. The result:

````html
<p style="background-color: #FFB03B; color: #8E2800; padding: 8px 15px;">Bananaaa!</p>
```

Nothing more, nothing less. Uses the amazing [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles).

# License
MIT License. Please check [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles) for its licensing.
