var webpack = require('webpack');
var path = require('path');

module.exports = {
    entry: [
        "./resources/assets/javascripts/app.js"
    ],
    output: {
        path: __dirname,
        filename: "./public/js/bundle.js",
    },
    module: {
        loaders: [
            { 
                test: /\.jsx?$/,
                loader: 'babel',
                exclude: /node_modules/,
                query: {
                    presets: ['es2015', 'react', 'react-hmre']
                }
            }
        ]
    },
    plugins: [new webpack.HotModuleReplacementPlugin()]
};


