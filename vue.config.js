const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
    // process.env.NODE_ENV === 'production'

    productionSourceMap: false,

    css: { sourceMap: true },

    publicPath: '/assets',
    assetsDir: '',
    outputDir: 'web/assets',

    pages: {
        index: {
            entry: 'js/index.js',
            template: 'views/vue/index.php',
            filename: '../../views/layouts/index.php',
            favicon: 'web/img/f.png'
        },
        admin: {
            entry: 'admin/js/admin.js',
            template: 'views/vue/admin.php',
            filename: '../../views/layouts/admin.php',
            favicon: 'web/img/f.png'
        },
    },


    filenameHashing: process.env.NODE_ENV === 'production',
    configureWebpack: {
        output: {
            //filename: '[name].[contenthash].bundle.js',
            filename: process.env.NODE_ENV === 'production'
                ? '[name].[contenthash].bundle.js'
                : '[name].bundle.js',
        },
        optimization: {
            minimizer: [new UglifyJsPlugin(
                {
                    test: /\.js(\?.*)?$/i,
                    // Разрешить параллелизм
                    parallel: true,
                    // Включаем кеш
                    cache: true
                }
            )],
            splitChunks: {
                chunks: 'async',
                minSize: 10000,
                minChunks: 10,
                maxAsyncRequests: 30,
                maxInitialRequests: 30,
                enforceSizeThreshold: 15000,
                cacheGroups: {
                    defaultVendors: {
                        test: /[\\/]node_modules[\\/]/,
                        priority: -10,
                        reuseExistingChunk: true,
                    },
                    default: {
                        minChunks: 10,
                        priority: -20,
                        reuseExistingChunk: true,
                    },
                },
            },
        },
        resolve: {
            modules: [
                path.resolve(__dirname, 'admin/js')
            ],
            alias: {
                '@': path.join(__dirname, "admin/js"),
                '@admin': path.join(__dirname, "admin/js"),
                '@site': path.join(__dirname, "js"),
                '@front': path.join(__dirname, "js")
            }
        }
    },

    devServer: {
        host: 'trest.local',
        proxy: {
            "/": {
                target: "http://trest.local:80"
                // secure: false
            }
        }
    }


}
