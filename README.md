# Publisher
Nette extension, copies files/folders from private folders to public

## Usage

``composer require teddy/publisher``

```yaml
extensions:
    publisher: Teddy\Publisher\Extension

publisher:
    package1:
        from: %appDir%/../vendor/package1/forms
        to: %wwwDir%
        items:
            - /js/init.js
            - /js/folder
    package2:
        from: %appDir%/../vendor/package2/www
        to: %wwwDir%
        items:
            - /css
            - /js
```
