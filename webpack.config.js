/**
* WEBPACK.CONFIG.JS
* - default webpack.config.js
*/
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// const paths = require('./config');
// console.log(paths);

module.exports = {
  mode: 'development',
  entry: {
    "hansefair": "./src/hansefair.js",
    "hansefair_admin": "./src/hansefair_admin.js",
  },
  output: {
    filename: '[name].js',
  },
  optimization: {
    minimize: true,
    minimizer: [new UglifyJsPlugin({
      include: /\.min\.js$/,
      uglifyOptions: {
        output: {
          comments: false
        }
      }
    })],
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /(node_modules)/,
        loader: 'babel-loader',
        query: {
          presets: [
              "@babel/preset-env"
          ],
        },
      },
    ],
  },
};