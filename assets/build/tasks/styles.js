var gulp = require('gulp')
var rename = require('gulp-rename')
// var sass = require('gulp-sass')
var postcss = require('gulp-postcss')
var atImport = require('postcss-import')
var fontPath = require('postcss-fontpath')
var tailwindcss = require('tailwindcss')
// var easingGradients = require('postcss-easing-gradients')
// var inlineSvg = require('postcss-inline-svg')
var presetEnv = require('postcss-preset-env')
// var purgecss = require('@fullhuman/postcss-purgecss')
var purgecssWordpress = require('purgecss-with-wordpress')
var autoprefixer = require('autoprefixer')
var perfectionist = require('perfectionist')

var themeWhitelistPatterns = []
class TailwindExtractor {
  static extract (content) {
    return content.match(/[A-Za-z0-9-_:/]+/g) || []
  }
}

var paths = {
  src: 'assets/css/main.pcss',
  partials: 'assets/css/**/*.pcss',
  dest: 'assets/css/',
  name: 'main.css',
  config: 'tailwind.js',
}

var config = {
  atImport: {
    path: [paths.dest],
  },
  fontPath: {
    checkFiles: true,
    ie8Fix: true,
  },
  tailwind: paths.config,
  easingGradients: {
    colorMode: 'rgb',
  },
  inlineSvg: {
    path: 'assets/img/icons',
  },
  presetEnv: {
    stage: 0,
    autoprefixer: false,
    features: {
      'nesting-rules': { bubble: 'variants' },
    },
  },
  purgecss: {
    content: ['**/*.php', './views/**.*twig', './assets/**/*.pcss', './assets/**/*.svg', './assets/**/*.js'],
    extractors: [{
      extractor: TailwindExtractor,
      extensions: ['php', 'twig', 'pcss', 'svg', 'js'],
    }],
    whitelist: purgecssWordpress.whitelist,
    whitelistPatterns: purgecssWordpress.whitelistPatterns.concat(themeWhitelistPatterns),
  },
  autoprefixer: {
    cascade: false,
  },
  perfectionist: {
    cascade: false,
    indentSize: 2,
    trimLeadingZero: false,
    maxAtRuleLength: false,
    maxSelectorLength: false,
    maxValueLength: false,
  },
}

/*
 * Define our tasks using plain functions
 */
function styles () {
  return gulp.src(paths.src)
    .pipe(postcss([
      atImport(config.atImport),
      fontPath(config.fontPath),
      tailwindcss(config.tailwind),
      // easingGradients(config.easingGradients),
      // inlineSvg(config.inlineSvg),
      presetEnv(config.presetEnv),
      // purgecss(config.purgecss),
      autoprefixer(config.autoprefixer),
      perfectionist(config.perfectionist),
      require('postcss-single-line'),
    ]))
    .pipe(rename(paths.name))
    .pipe(gulp.dest(paths.dest))
}

function watchStyles () {
  return gulp.watch([
    paths.config,
    paths.src,
    paths.partials,
  ], styles)
}

// function stylesSass () {
//   return gulp.src('assets/css/theme.scss')
//     .pipe(sass().on('error', sass.logError))
//     .pipe(gulp.dest('assets/css/'))
// }

// function watchStylesSass () {
//   return gulp.watch([
//     'assets/css/**/*.scss',
//   ], stylesSass)
// }

exports.default = styles
exports.watch = watchStyles
// exports.stylesSass = stylesSass
// exports.watchStylesSass = watchStylesSass
