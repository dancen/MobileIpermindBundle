MobileIpermindBundle by Daniele Centamore
=================================

About
-----
The MobileIpermindBundle for Symfony 2 is a logic and memory game optimized for smartphones and tablet using jQuery Mobile as a client Framework. 
Its a different version of the popular game "Mastermind". All classes and files needed are embedded in the Bundle, so it do not depend on other Bundles.

View screenshots and more info on [my personal page](http://www.danielecentamore.com/wordpress/).

Installation requirements
-------------------------
You should be able to get Symfony 2 up and running before you can install the MobileIpermindBundle.

Installation instructions
-------------------------
Installation is straightforward, add the following lines to your deps file:

```
[MobileIpermindBundle]
    git=https://github.com/dancen/MobileIpermindBundle.git
    version=1.1.0
```

Register the Mobile namespace in your autoload.php file:

```
'Mobile'        => __DIR__.'/../src/Mobile'
```

Add the MobileIpermindBundle to your AppKernel.php file:

```
new Mobile\IpermindBundle\MobileIpermindBundle(),
```

Contact
-------
Daniele Centamore (info@danielecentamore.com)

Download
--------
You can also clone the project with Git by running:

```
$ git clone git://github.com/dancen/MobileIpermindBundle
```

