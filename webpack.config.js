//Webpack requires this to work with directories
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const extract = require("mini-css-extract-plugin");

// This is main configuration object that tells Webpackw what to do. 
module.exports = {
    //path to entry paint
    entry: {
        hansefair: './src/js/hansefair.js',
        hansefair_admin: './src/js/hansefair_admin.js',
    },
    //path and filename of the final output
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: '[name].js',
    },
    devtool: 'source-map',
    // devtool: 'inline-source-map',

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                // Apply rule for .sass, .scss or .css files
                test: /\.(sa|sc|c)ss$/,

                // Set loaders to transform files.
                // Loaders are applying from right to left(!)
                // The first loader will be applied after others
                use: [
                    {
                        // After all CSS loaders we use plugin to do his work.
                        // It gets all transformed CSS and extracts it into separate
                        // single bundled file
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        // This loader resolves url() and @imports inside CSS
                        loader: "css-loader",
                    },
                    {
                        // Then we apply postCSS fixes like autoprefixer and minifying
                        loader: "postcss-loader"
                    },
                    {
                        // First we transform SASS to standard CSS
                        loader: "sass-loader",
                        options: {
                            implementation: require("sass")
                        }
                    }
                ]
            }
        ]
    },
    plugins: [

        new MiniCssExtractPlugin({
            filename: "[name].css"
        })

    ]

    // mode: 'development'
}