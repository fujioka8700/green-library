import {
  getCookieValue
} from './util';

window._ = require('lodash');

try {
  require('bootstrap');
} catch (e) {}

window.axios = require('axios');

// Ajaxリクエストであることを示すヘッダーを付与する
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.request.use(config => {
  // クッキーからトークンを取り出してヘッダーに添付する
  config.headers['X-XSRF-TOKEN'] = getCookieValue('XSRF-TOKEN');

  return config;
})

// レスポンスを受けた後の処理を上書きする
window.axios.interceptors.response.use(
  response => response,
  error => error.response || error,
)
