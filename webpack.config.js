module.exports = {
  entry:
    [
    './src/build/duckphone.js' ],
  output: {
    filename: 'appCreate.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        loaders: ['babel-loader']
      }
    ]
  },
  resolve: {
    extensions: ['', '.js']
} };
