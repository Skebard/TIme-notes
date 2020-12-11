const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const javascriptRules ={
    test:/\.js$/,
    exclude: /node_modules/,
    use: {
        loader: 'babel-loader',
        options: {
            presets: ['@babel/preset-env']
        }
    }
}

const cssRules = {
    test:/\.scss$/,
    use: ['style-loader',  //3. Inject styles into DOM
    'css-loader', //2. Turns css into commonjs
    'sass-loader' //1.turns sass into css
]
}

module.exports = {
    entry:'./src/index.js',
    output:{
        filename: 'js/main.js',
        path: path.resolve(__dirname,'dist'),
    },
    module:{
        rules:[javascriptRules,cssRules]
    },
    plugins: [
        new HtmlWebpackPlugin({
            title: 'Time Notes',
            template:'src/index.html'
        }),
      ],
}