'use strict'

var gulp = require('gulp')
var styles = require('./assets/build/tasks/styles.js')
var icons = require('./assets/build/tasks/icons.js')
var pot = require('./assets/build/tasks/pot.js')

/**
 * Tasks
 */
var build = gulp.series(styles.default, icons.default, pot.default)
var watch = gulp.parallel(styles.watch, icons.watch, pot.watch)

gulp.task('build', build)
gulp.task('build:styles', styles.default)
gulp.task('build:icons', icons.default)
gulp.task('build:pot', pot.default)

gulp.task('watch', watch)
gulp.task('watch:styles', styles.watch)
gulp.task('watch:icons', icons.watch)
gulp.task('watch:pot', pot.watch)

gulp.task('default', build)
