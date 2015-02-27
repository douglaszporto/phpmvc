/*
* Dependencias
*/   
var	gulp      = require('gulp'           );
	uglify    = require('gulp-uglify'    );
	rename    = require("gulp-rename"    );
	minifyCSS = require("gulp-minify-css");

/*
* Tarefa minificar responsável por minificar arquivos com extensão js
*/
gulp.task('minificar', function () {
	gulp.src(['./statics/js/*.js', '!./statics/js/*.min.js'])
	.pipe(rename({suffix: '.min'}))
	.pipe(uglify())
	.pipe(gulp.dest('./statics/js/'))
});

/*
* Tarefa mincss responsável por minificar arquivos com extensão css
*/
gulp.task('mincss', function() {
	gulp.src(['./statics/css/*.css','!./statics/css/*.min.css'])
	.pipe(rename({suffix: '.min'}))
	.pipe(minifyCSS({keepBreaks:false}))
	.pipe(gulp.dest('./statics/css/'))
});

/*
* Responsável por executar as tarefas minificar e mincss sempre que é modificado um arquivo css ou js
*/

gulp.task('watch',['minificar', 'mincss'], function () {
	gulp.watch(['./statics/js/*.js','!./statics/js/*.min.js'], ['minificar']);
	gulp.watch(['./statics/css/*.css','!./statics/css/*.min.css'], ['mincss']);
});



