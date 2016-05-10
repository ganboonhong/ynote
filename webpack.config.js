var webpack = require('webpack');
var path = require('path');

module.exports = {
    entry: [
        "./resources/assets/javascripts/app.js",
        "webpack-dev-server/client?http://localhost:8080",
        "webpack/hot/dev-server"
    ],
    output: {
        path: __dirname,
        filename: "bundle.js",
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


