# Basic PHP Project Scaffolding
Basic PHP project scaffolding with Composer, Gulp, Bower, &amp; LESS.

## Overview
This project helps speed up the process of setting up a simple PHP project. It creates a maintainable directory structure in addition to configuring Composer, Gulp, and Bower - and that's basically it. The project is intentionally bare so you can do whatever you want. By default it uses LESS but you can easily replace it with SASS or whatever you want. I've also gone ahead and commented out some recommended components such as Mailgun, jQuery, and Skeleton, and included an example PHP mailer.

## Project Tree
```
.
├── assets
|   ├── js
|   |   └── application.js
|   ├── less
|   |   └── application.less
|
├── public
|   ├── assets
|   |   ├── css
|   |   └── js
|   └── index.html
|
├── vendor
|   └── bower_components
|
├── bower.json
├── gulpfile.js
├── package.json
```

## Getting Started
**Prerequirements:** You must have [Composer](https://getcomposer.org/) and [Node.js](https://nodejs.org/) installed on your system. It's pretty easy to install them, just follow the instructions on their websites. You should also install Bower and Gulp globally (`npm install -g bower gulp`).

1. Add composer packages to `composer.json`
2. Run `composer update` to download and install composer packages
3. Install node packages with `npm install`
4. Add bower the components you want to install to `bower.json`. You can find them on GitHub or via [Bower search](http://bower.io/search/).
5. Install bower components with `bower install`
6. Add javascripts to `gulpfile.js`
7. Import stylesheets in `assets/less/application.less`
8. Run `gulp watch` and start developing