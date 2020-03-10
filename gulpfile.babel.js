import { src, dest, series } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import concatCss from 'gulp-concat-css';
import compress from 'gulp-imagemin';
import minifyJs from 'gulp-minify';

const PRODUCTION = yargs.argv.prod;

export const arcadianStyle = () => {
  return src(['assets/src/scss/libraries/*.scss', 'assets/src/scss/**/*.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(concatCss('bundle.min.css'))
    .pipe(cleanCss({compatibility:'ie8'}))
    .pipe(dest('assets/dist/css'));
}

export const compressImages = () => {
  return src('assets/src/img/*')
    .pipe(compress())
    .pipe(dest('assets/dist/img'))
}
export const minJs = () => {
    return src('assets/src/js/*')
    .pipe(minifyJs({noSource: true}))
    .pipe(dest('assets/dist/js'));
}
export const minJsVendor = () => {
    return src('assets/src/js/vendor/*')
    .pipe(minifyJs({noSource: true}))
    .pipe(dest('assets/dist/js/vendor'));
}
export const promise = (cb) => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve();
    }, 300);
  });
};

export default series(arcadianStyle, compressImages, minJs, minJsVendor)
