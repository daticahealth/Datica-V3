# Datica V3 Site

We're building this with [Statamic](https://statamic.com/). 

## Local Development

You can clone this repo to your local machine to work. We recommend using [Valet](https://laravel.com/docs/5.8/valet) for local PHP development.

### Installation (macOS)

#### PHP & local hosting

- [ ]  [Install](https://brew.sh/) the `brew` package manager
- [ ]  `brew update`
- [ ]  `brew install php` - if permissions issues, see [this](https://github.com/jakubroztocil/httpie/issues/645). `brew doctor` helped, unlinked & relinked php then install again.
- [ ]  `brew install php composer`
- [ ]  `composer require laravel/valet`

if you have JIT memory problems:
`php --ini` - see what init file is in use
comment out and set `pcre.jit=0` I also upped ram here.

Also [Laravel memory limits](https://laracasts.com/discuss/channels/laravel/laravel-valet-memory-limit) 

- [ ]  Now check if it's in the $PATH, info here: [https://stackoverflow.com/a/37086498](https://stackoverflow.com/a/37086498)
- [ ]  `valet restart`
- [ ]  use `valet link` in the dir you want to serve, it will report the generated .test domain url. The `valet paths` command will list your local domains.

## Product Key Management

The Statamic and other license keys must be [stored locally in a `.env` file](https://docs.statamic.com/environments) in the project root (next to the `statamic` folder). **Do not commit this file to git**. This keeps license keys and other private info out of the public repository. Format:

```
APP_ENV=dev
LICENSE_KEY=12360F42...
```
Note that config files must be adapted to read these keys.

## Coding Best Practices
- We’ve set an `.editorconfig` file to control indentation. Most code editors respect these settings.
- [Airbnb CSS Styleguide](https://github.com/airbnb/css).
- [Airbnb JavaScript styleguide](https://github.com/airbnb/javascript).
- PHP Standards are based on [PHP-FIG](https://www.php-fig.org/).

### Theming
- In Statamic, all theme files are in the folder `site/themes/main`. This includes the `package.json` and `node_modules`.
- Make sure you are on a recent version of Node (v10+) and NPM (v6+). I prefer [n](https://github.com/tj/n) for managing node versions.
- Run `npm install` in `public/site/themes/main` directory.
- Set localURL variable in `webpack.mix.js` to be the url you are using locally
- To view the rendered site, run open `site/themes/main` in a Terminal window and run `npm run watch`. This will run the site using Browser Sync in your default browser. Assets will now compile and livereload.

### JavaScript
- Compiling assets is done with Laravel Mix, the config file for this is `webpack.mix.js`
- To date we’ve used jQuery for JavaScript with Foundation's JS libraries, but are moving away from it towards vanilla JavaScript. 
- Lazy loading images is done with the [Lozad library](https://apoorv.pro/lozad.js/).
- If you’d like to add more JavaScript libraries, you can import them using 

### CSS
- We're currently leveraging SASS, but may move entirely to PostCSS in the future. We embrace a [utility first approach](https://frontstuff.io/in-defense-of-utility-first-css), embodied by [Tailwindcss](https://tailwindcss.com/) for greater reliance on design tokens (color, spacing, size, etc). The [TailwindCSS Cheat Sheet](https://nerdcave.com/tailwind-cheat-sheet) is quite handy.

## Optimizing for production

Running `npm run prod` will output (locally) optimized & minified CSS & JS, as well as running [PurgeCSS](https://www.purgecss.com/) to remove extra CSS classes. This could be made a server-only setting, but it's useful to visually check the site to ensure important CSS isn't getting cut.

The release workflow currently needs the developer to run `npm run prod` before pushing to `master`. 