# Dynamic Styles

This package contains Fusion objects to extract dynamic stylesheet during page rendering.

*Warning*: The current Fusion implementation does not support this feature, so this package [require this Pull Request](https://github.com/neos/neos-development-collection/pull/1402)

It's common to have complex components that are used only on a few pages. With this plugin you can nicely define in your
Fusion object when you need a specific stylesheets for the the current Fusion object.

## Configure your Fusion objects

    prototype(WebStarter:Object.PersonList) < prototype(Fusion:Template) {
        templatePath = 'resource://Ttree.SwissConfederation.WebStarter/Private/Templates/PersonList.html'
        @css         = 'resource://Ttree.SwissConfederation.WebStarter/Private/Stylesheets/PersonList.css'
    }
    
## Configure your document to inline the CSS during page rendering

    prototype(Neos.Neos:Page).@process.styles = Ttree.Fusion.DynamicStyles:InlineStyles

## Configure your document to build a minified external CSS with all the CSS used in the current page

    prototype(Neos.Neos:Page).@process.styles = Ttree.Fusion.DynamicStyles:ExternalStyles


## What's next ?

- [x] Fusion object to inline external CSS resource (inline)
- [x] CSS minification
- [x] Add a Fusion object to include external CSS resource
- [ ] More inteligent build process (css ordering, ...)
- [ ] Add more configuration (minification, concatenation, compression, ..)
- [ ] Generate the CSS name automatically based on the prototype name (pluggable)
- [x] Concatenation
- [ ] Gzip

## Acknowledgments

Development sponsored by [ttree ltd - neos solution provider](http://ttree.ch).

We try our best to craft this package with a lots of love, we are open to sponsoring, support request, ... just contact us.

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
