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
```yaml
new Eschmar\CssInlinerBundle\CssInlinerBundle(),
```

# Usage
This bundle introduces a new tag to twig:

````html
{% cssinline %}
    <script>
        p {
            padding: 8px 15px;
            color: #8E2800;
            background-color: #FFB03B;
        }
    </script>
    <p>Bananaaa!</p>
{% endcssinline %}
```

Which inlines all ``<script>`` tags and stripts them out afterwards. The result:

````html
    <p style="padding: 8px 15px; color: #8E2800; background-color: #FFB03B;">Bananaaa!</p>
```

Nothing more, nothing less. Uses the amazing [CssToInlineStyles](https://github.com/tijsverkoyen/CssToInlineStyles).
