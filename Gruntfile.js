// Generated on 2014-01-12 using generator-webapp 0.4.6
'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// use this if you want to recursively match all subfolders:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

	// Load grunt tasks automatically
	require('load-grunt-tasks')(grunt);

	// Time how long tasks take. Can help when optimizing build times
	require('time-grunt')(grunt);

	// Define the configuration for all the tasks
	grunt.initConfig({

		// Project settings
		yeoman: {
			// Configurable paths
			app: '.',
			dist: '.',
			wordpress: '../../..'
		},

		// Watches files for changes and runs tasks based on the changed files
		watch: {
			js: {
				files: ['<%= yeoman.app %>/js/{,*/}*.js'],
				tasks: ['jshint', 'uglify'],
				options: {
					livereload: true
				}
			},
			jstest: {
				files: ['test/spec/{,*/}*.js'],
				tasks: ['test:watch']
			},
			gruntfile: {
				files: ['Gruntfile.js']
			},
			styles: {
				files: ['<%= yeoman.app %>/sass/**/*.{scss,sass}'],
				tasks: ['compass:server', 'autoprefixer']
			},
			livereload: {
				options: {
					livereload: '<%= connect.options.livereload %>'
				},
				files: [
					'<%= yeoman.app %>/{,*/}*.hbs',
					'.tmp/css/{,*/}*.css',
					'<%= yeoman.app %>/images/{,*/}*.{gif,jpeg,jpg,png,svg,webp}'
				]
			}
		},

		// The actual grunt server settings
		connect: {
			options: {
				port: 9000,
				livereload: 35729
			},
			livereload: {
				options: {
					open: true,
					base: [
						'.tmp',
						'<%= yeoman.wordpress %>'
					]
				}
			},
			test: {
				options: {
					port: 9001,
					hostname: 'localhost',
					base: [
						'.tmp',
						'test',
						'<%= yeoman.wordpress %>'
					]
				}
			}
		},

		// Empties folders to start fresh
		clean: {
			dist: '.tmp',
			server: '.tmp'
		},

		// Make sure code styles are up to par and there are no obvious mistakes
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				reporter: require('jshint-stylish')
			},
			all: [
				'Gruntfile.js',
				'<%= yeoman.app %>/js/{,*/}*.js',
				'!<%= yeoman.app %>/js/{,*/}*.min.js',
				'!<%= yeoman.app %>/js/vendor/*',
				'test/spec/{,*/}*.js'
			]
		},

		// Mocha testing framework configuration options
		mocha: {
			all: {
				options: {
					run: true,
					urls: ['http://<%= connect.test.options.hostname %>:<%= connect.test.options.port %>/index.html']
				}
			}
		},

		// Compiles Sass to CSS and generates necessary files if requested
		compass: {
			options: {
				sassDir: '<%= yeoman.app %>/sass',
				cssDir: '<%= yeoman.app %>',
				generatedImagesDir: '.tmp/images/generated',
				imagesDir: '<%= yeoman.app %>/images',
				javascriptsDir: '<%= yeoman.app %>/js',
				fontsDir: '<%= yeoman.app %>/sass/fonts',
				importPath: ['<%= yeoman.app %>/bower_components'],
				httpPath: '/wordpress',
				httpImagesPath: '/images',
				httpGeneratedImagesPath: '/images/generated',
				httpFontsPath: '/fonts',
				relativeAssets: true,
				assetCacheBuster: false,
				require: ['sass-globbing']
			},
			dist: {
				options: {
					debugInfo: false,
					outputStyle: 'compressed',
				}
			},
			server: {
				options: {
					debugInfo: true
				}
			}
		},

		// Compile Sass to CSS
		// sass: {
		// 	server: {
		// 		options: {
		// 			sourcemap: true,
		// 			style: 'expanded'
		// 		},
		// 		files: {
		// 			'content/themes/penny4nasa/style.css': 'content/themes/penny4nasa/styles/style.scss'
		// 		}
		// 	},
		// 	dist: {
		// 		options: {
		// 			style: 'compressed'
		// 		},
		// 		files: {
		// 			'content/themes/penny4nasa/style.css': 'content/themes/penny4nasa/styles/style.scss'
		// 		}
		// 	}
		// },

		// Add vendor prefixed styles
		autoprefixer: {
			options: {
				browsers: ['last 1 version']
			},
			dist: {
				files: [{
					expand: true,
					cwd: '<%= yeoman.app %>',
					src: 'style.css',
					dest: '<%= yeoman.dist %>'
				}]
			}
		},

		// The following *-min tasks produce minified files in the dist folder
		imagemin: {
			dist: {
				files: [{
					expand: true,
					cwd: '<%= yeoman.app %>/images',
					src: '{,*/}*.{gif,jpeg,jpg,png}',
					dest: '<%= yeoman.dist %>/images'
				}]
			}
		},
		svgmin: {
			dist: {
				files: [{
					expand: true,
					cwd: '<%= yeoman.app %>/images',
					src: '{,*/}*.svg',
					dest: '<%= yeoman.dist %>/images'
				}]
			}
		},

		// By default, your `index.html`'s <!-- Usemin block --> will take care of
		// minification. These next options are pre-configured if you do not wish
		// to use the Usemin blocks.
		cssmin: {
			dist: {
				files: {
					'<%= yeoman.dist %>/style.css': '<%= yeoman.app %>/style.css'
				}
			}
		},
		uglify: {
			dist: {
				files: {
					'<%= yeoman.dist %>/js/main.min.js': '<%= yeoman.dist %>/js/main.js'
				}
			}
		},

		// Run some tasks in parallel to speed up build process
		concurrent: {
			server: [
				'compass:server'
			],
			dist: [
				'compass:dist',
				'imagemin',
				'svgmin'
			]
		}
	});

	grunt.registerTask('serve', function (target) {
		if (target === 'dist') {
			return grunt.task.run(['build', 'connect:dist:keepalive']);
		}

		grunt.task.run([
			'clean:server',
			'concurrent:server',
			'autoprefixer',
			// 'connect:livereload',
			'watch'
		]);
	});

	grunt.registerTask('test', function (target) {
		if (target !== 'watch') {
			grunt.task.run([
				'clean:server',
				'autoprefixer',
			]);
		}

		grunt.task.run([
			// 'mocha'
		]);
	});

	grunt.registerTask('build', [
		'clean:dist',
		'concurrent:dist',
		'autoprefixer',
		'cssmin',
		'uglify'
	]);

	grunt.registerTask('default', [
		'newer:jshint',
		'test',
		'build'
	]);
};
