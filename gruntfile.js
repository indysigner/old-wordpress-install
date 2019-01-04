// gruntfile.js
module.exports = function ( grunt ) {
	var path = require( 'path' ),
		JAVASCRIPT_DIR = './assets/js/',
		LESS_DIR = './assets/less/',
		CSS_DIR = './assets/css/';

	require( "matchdep" ).filterDev( "grunt-*" ).forEach( grunt.loadNpmTasks );

	grunt.initConfig( {
		debug:        {
			options: {
				// do not open node-inspector in Chrome automatically
				open: false
			}
		},
		// Stylesheets ____________________________
		less:         {
			options: {
				paths:  CSS_DIR,
				report: true
			},
			src:     {
				// fetching all *.less-Files in CSS_DIR + 'less/'
				// and save them as *.css-Files with compiled css
				expand: true,
				cwd:    LESS_DIR,
				src:    "*.less",
				dest:   CSS_DIR,
				ext:    ".css"
			}
		},
		autoprefixer: {
			options: {
				browsers: ['last 3 versions', '> 1%'],
				report:   true
			},
			theme:   {
				expand: true,
				cwd:    CSS_DIR,
				dest:   CSS_DIR,
				src:    [
					'above-the-fold.css',
					'archive-pages.css',
					'articles-only.css',
					'below-articles.css',
					'comments.css',
					'contact.css',
					'main.css',
					'search-results.css'
				]
			}
		},
		lineending:   {
			theme: {
				expand:  true,
				cwd:     CSS_DIR,
				dest:    CSS_DIR,
				src:     [
					'*.css'
				],
				options: {
					eol:       'lf',
					overwrite: true
				}
			}
		},
		cssmin:       {
			theme: {
				options: {
					processImport: true
				},
				expand:  true,
				cwd:     CSS_DIR,
				dest:    CSS_DIR,
				ext:     '.min.css',
				src:     [
					'*.css',
					// Exceptions
					'!*.min.css'
				]
			}
		},

		// JavaScript Task ____________________________
		concat:       {
			options: {
				separator: '\n'
			},
			onload:  {
				src:  JAVASCRIPT_DIR + 'src/onload/*.js',
				dest: JAVASCRIPT_DIR + 'onload.js'
			}
		},
		browserify: {
			dist: {
				options: {
					transform: [
						[ "babelify", { loose: "all" } ]
					]
				},
				files  : {
					"./assets/js/ads.js": "./assets/js/src/ads/index.js",
					'./assets/js/blocked.js' : './assets/js/src/blocked/index.js',
					'./assets/js/lazy-images.js' : './assets/js/src/lazy-images/index.js',
					'./assets/js/fastclick.js' : './assets/js/src/fastclick/index.js'
				}
			}
		},
		uglify:       {
			dist: {
				expand: true,
				cwd:    JAVASCRIPT_DIR,
				dest:   JAVASCRIPT_DIR,
				rename: function ( destBase, destPath ) {
					// Fix for files with mulitple dots
					destPath = destPath.replace( /(\.[^\/.]*)?$/, '.min.js' );
					return path.join( destBase || '', destPath );
				},
				src:    [
					'*.js',
					// Exceptions
					'!*.min.js',
					'!prism.js',
					'!codepen.js'
				]
			}
		},
		jshint:       {
			grunt:  {
				src: ['Gruntfile.js']
			},
			onload: {
				expand: true,
				cwd:    JAVASCRIPT_DIR,
				src:    'onload.js'
			},
			blocked: {
				expand: true,
				cwd:    JAVASCRIPT_DIR,
				src:    'blocked.js'
			},
			ads:    {
				expand: true,
				cwd:    JAVASCRIPT_DIR,
				src:    'ads.js'
			}
		},

		// Watch Task ____________________________
		watch:        {
			themescss: {
				files:    [
					LESS_DIR + '**/*.less'
				],
				tasks:    ['css'],
				options:  {
					dot: true
				},
				spawn:    true,
				interval: 2000
			},
			themejs: {
				files:    [
					JAVASCRIPT_DIR + 'src/onload/*.js'
				],
				tasks:    ['javascript'],
				options:  {
					dot: true
				},
				spawn:    true,
				interval: 2000
			}
		}
	} );

	grunt.registerTask( 'css', ['less', 'autoprefixer:theme', 'lineending:theme', 'cssmin:theme'] );
	grunt.registerTask( 'javascript', ['browserify', 'concat:onload', 'uglify'] );
	grunt.registerTask( 'javascript-testing', ['jshint'] );
	grunt.registerTask( 'production', ['javascript', 'css'] );
};
