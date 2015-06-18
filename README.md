# Publisher
Nette extension, copies files/folders from private folders to public

## Usage

``composer require teddy/publisher``

```yaml
extensions:
    publisher: Teddy\Publisher\Extension

publisher:
    publicRoot: %wwwDir%
    assets:
        Package1:
            hiddenRoot: %libsDir%/teddy/framework/www
            dirs:
                - /css/teddy
                - /js/teddy
                - /images/teddy
        Package2:
            hiddenRoot: %libsDir%/package2
            dirs:
                - /css/package2
```
