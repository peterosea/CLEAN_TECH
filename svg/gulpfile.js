const gulp = require("gulp");
const svgstore = require("gulp-svgstore");
const svgmin = require("gulp-svgmin");
const rename = require("gulp-rename");
const path = require("path");
const inject = require("gulp-inject");
const merge = require("merge-stream");
var cheerio = require("gulp-cheerio");

const files = [
  {
    src: "../Theme/template-parts/SvgStore-inject.php",
    dest: "../Theme/template-parts",
    name: "SvgStore",
  },
];
gulp.task("svgstore", function () {
  var svgs = gulp
    .src("source/*.svg")
    .pipe(
      cheerio({
        run: function ($) {
          $("[fill]").removeAttr("fill");
        },
        parserOptions: { xmlMode: true },
      })
    )
    .pipe(
      svgmin(function (file) {
        var prefix = path.basename(file.relative, path.extname(file.relative));
        return {
          plugins: [
            {
              cleanupIDs: {
                prefix: prefix + "-",
                minify: true,
              },
            },
            {
              removeViewBox: false,
            },
            {
              mergePaths: false,
            },
            {
              removeStyleElement: true,
            },
          ],
        };
      })
    )
    .pipe(svgstore({ inlineSvg: true }));

  function fileContents(filePath, file) {
    return file.contents.toString();
  }

  const tasks = files.map((file) => {
    return gulp
      .src(file.src, { dot: true })
      .pipe(inject(svgs, { transform: fileContents }))
      .pipe(
        rename((path) => {
          path.basename = file.name;
        })
      )
      .pipe(gulp.dest(file.dest));
  });

  return merge(tasks);
});

gulp.task("default", gulp.series(["svgstore"]));
