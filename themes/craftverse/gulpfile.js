const { task, src, dest, series, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCss = require('gulp-clean-css');
const minify = require("gulp-minify");

task('sass', () => {
  return src(['sass/style.scss', 'sass/reset.scss'])
    .pipe(sass())
    .pipe(dest('css'));
});

task('minify-css', () => {
  return src(['css/style.css', 'css/reset.css', 'css/bootstrap-grid.css'])
    .pipe(cleanCss({compatibility: 'ie8'}))
    .pipe(dest('dist/css'));
});

task('minify-js', () => {
  return src('js/app.js', { allowEmpty: true })
    .pipe(minify({noSource: true}))
    .pipe(dest('dist/js'))
});

task('default', series('minify-js', 'sass', 'minify-css', function (done) {
  watch('sass/**/*.scss', series('sass', 'minify-css'));
  watch('js/app.js', series('minify-js'));
  done();
}));