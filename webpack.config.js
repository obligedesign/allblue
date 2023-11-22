//path モジュールの読み込み
const wpFlag = true
const themeName = 'all_blue'
const version = 1
const devUrl = 'http://localhost:3000'
const THEME_NAME = `${themeName}`

const enabledSourceMap = process.env.NODE_ENV !== 'production'
const path = require('path')
const glob = require('glob')
const CopyFilePlugin = require('copy-webpack-plugin')
// const WriteFilePlugin = require("write-file-webpack-plugin")
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const HtmlWebpackPugPlugin = require('html-webpack-pug-plugin')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const StylelintPlugin = require('stylelint-webpack-plugin')
const FixStyleOnlyEntries = require('webpack-fix-style-only-entries')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')

const distPass = wpFlag ? `wp-content/themes/` : ''

const src = {
  root: `./src/`,
  html: `./src/`,
  php: `./src/`,
  css: `./src/assets/css`,
  js: `./src/assets/js`,
  json: `./src/assets/json`,
  img: `./src/assets/img`,
}

const dest = {
  root: `dist/${distPass}`,
  html: `dist/${distPass}${THEME_NAME}_v${version}/`,
  php: `dist/${distPass}${THEME_NAME}_v${version}/`,
  css: `dist/${distPass}${THEME_NAME}_v${version}/assets/css`,
  js: `dist/${distPass}${THEME_NAME}_v${version}/assets/js`,
  json: `dist/${distPass}${THEME_NAME}_v${version}/assets/json`,
  img: `dist/${distPass}${THEME_NAME}_v${version}/assets/img`,
}

/**
 * ファイル名のみ抽出する
 * @param path
 * @returns {*}
 */
const getFileName = function(path) {
  return path.replace(/\.[^/.]+$/, '')
}

const app = {
  entry: {
    [`/assets/js/app`]: `${src.js}/app.js`,
    [`/assets/css/styles`]: `${src.css}/styles.scss`,
  },
  output: {
    filename: `[name].js`,
    path: path.resolve(__dirname, dest.html),
    publicPath: '',
  },
  resolve: {
    extensions: ['.js'],
  },
  devServer: {
    //webpack-dev-server setting
    host: devUrl || '0.0.0.0',
    contentBase: path.join(__dirname, 'dist'),
    open: true,
    watchContentBase: true,
    writeToDisk: true,
    overlay: true, //エラーをオーバーレイ表示
  },
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.js$/,
        exclude: /node_modules/,
        use: 'eslint-loader',
      },
      {
        test: /\.js$/,
        // exclude: /node_modules\/(?!(dom7|ssr-window|swiper)\/).*/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          // Babel のオプションを指定する
          options: {
            presets: [
              // プリセットを指定することで、ES2020 を ES5 に変換
              '@babel/preset-env',
            ],
          },
        },
      },
      {
        test: /\.scss$/,
        use: [
          // MiniCssExtractPlugin
          {
            loader: MiniCssExtractPlugin.loader,
          },
          // CSS Bundle
          {
            loader: 'css-loader',
            options: {
              url: false,
              sourceMap: enabledSourceMap,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: enabledSourceMap,
              postcssOptions: {
                plugins: [
                  'autoprefixer',
                ],
              },
            },
          },
          // Sass を CSS へ変換するローダー
          {
            loader: 'sass-loader',
            options: {
              implementation: require('sass'),
              sassOptions: {
                fiber: false,
                outputStyle: 'expanded',
              },
              sourceMap: enabledSourceMap,
            },
          },
        ],
      },
      {
        test: /\.pug$/,
        use: [
          {
            loader: 'pug-loader',
            options: {
              pretty: true,
              root: path.resolve(__dirname, 'src'),
            },
          },
        ],
      },
    ],
  },
  // plugin setting
  plugins: [
    // ...pugTemplates,
    // new HtmlWebpackPugPlugin(),
    new FixStyleOnlyEntries(),
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: '[name].css',
      ignoreOrder: true,
    }),
    new StylelintPlugin({
      files: `${src.css}/**/*.scss`,
      syntax: 'scss',
    }),
    new CopyFilePlugin({
      patterns: [
        {
          context: src.root,
          from: '**/!(_)*.{png,jpg,jpeg,gif,pdf,svg,ico,json,cur,css,htaccess,ttf,eot,woff,woff2,html,php,txt,icon}',
          to: path.resolve(__dirname, dest.html),
        },
      ],
    }),
    // new WriteFilePlugin(),
  ],
  //source-map
  devtool: 'source-map',

  // node_modules を監視（watch）対象から除外
  watchOptions: {
    ignored: /node_modules/,
  },
  optimization: {
    minimize: true,
    minimizer: [
      new CssMinimizerPlugin({
        exclude: `style.css`,
      }),
    ],
  },
}

module.exports = app